<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserApiController extends Controller
{
    public function updateProfile(Request $request){
        try{
            $input = $request->all();
            $address = $input['address'];
            $birth_date = $input['birth_date'];
            $input['properties'] = [
                'birth_date' => $birth_date,
                'address'    => $address,
            ];
            $user = $request->user();
            if($user){
                $user->update($input);
            }
            return $this->sendResponse($user,'Success update!');
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage());
        }
    }
    public function getProfile(Request $request){
        return $this->sendResponse($request->user(),'Success retrieved profile');
    }
    public function firebaseLogin(Request $request){
        try{
            $this->validate($request, [
                'uid' => 'required',
            ]);
            $firebaseAuth = $this->firebaseValidation($request->get('uid'));
            $phoneNumber = str_replace('+855', '0',$firebaseAuth->phoneNumber);
            $user = null;
            if($phoneNumber){
                $user = User::where('phone_number',$phoneNumber)->first();
                if($user){
                    $user->tokens()->delete();
                    $token = $user->createToken('loyalty-client');
                    $user->api_token = $token->plainTextToken;
                    auth()->login($user);
                }else{
                    $name = Str::random(8);
                    $user = User::create(['name'=>$name,'phone_number'=>$phoneNumber,'active'=>true]);
                    $user->assignRole('Client');
                    $token = $user->createToken('loyalty-client');
                    $user->api_token = $token->plainTextToken;
                    auth()->login($user);
                }
            }
            return $this->sendResponse($user,'Login Success!');
        }catch (\Exception $exception){
            return $this->sendError($exception->getMessage());
        }
    }
}

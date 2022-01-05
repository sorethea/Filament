<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;



/**
 * Class Profile
 * @package App\Models
 * @version January 5, 2022, 3:38 am UTC
 *
 * @property integer $user_id
 * @property string $avatar
 * @property string $address
 * @property string $birth_date
 * @property string $properties
 */
class Profile extends Model
{


    public $table = 'profiles';
    



    public $fillable = [
        'user_id',
        'avatar',
        'address',
        'birth_date',
        'properties'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'avatar' => 'string',
        'address' => 'string',
        'birth_date' => 'date',
        'properties' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

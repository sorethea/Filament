<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'avatar' => $this->avatar,
            'address' => $this->address,
            'birth_date' => $this->birth_date,
            'properties' => $this->properties,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

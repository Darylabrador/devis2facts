<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $role = new RoleResource($this->roles);
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role' => $role,
        ];
    }
}

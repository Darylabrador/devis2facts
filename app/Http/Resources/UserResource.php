<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    private $token = null;
    public function __construct($resource, $token = null)
    {
        $this->token = $token;
        parent::__construct($resource);
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (isset($this->token)) {
            $role = new RoleResource($this->roles);

            return [
                'id' => $this->id,
                'email' => $this->email,
                'token' => $this->token,
                'id_role' => $role,
            ];
        } else {
            return parent::toArray($request);
        }
    }
}

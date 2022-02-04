<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'employer';

    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'phoneNumber' => $this->resource->phoneNumber,
            'employeeId' => $this->resource->employeeId
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'employee';

    public function toArray($request)
    {
        return [
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'phoneNumber' => $this->resource->phoneNumber,
            'age' => $this->resource->age,
            'titleId' => $this->resource->titleId
        ];
    }
}

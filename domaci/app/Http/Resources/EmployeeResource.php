<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TitleCollection;

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
            'employeeId' => $this->resource->id,
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'phoneNumber' => $this->resource->phoneNumber,
            'age' => $this->resource->age,
            'title' => new TitleCollection($this->resource->title),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TitleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'title';

    public function toArray($request)
    {
        return [
            'titleId' => $this->resource->id,
            'titleName' => $this->resource->titleName,
            'description' => $this->resource->description
        ];
    }
}

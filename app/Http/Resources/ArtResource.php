<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtResource extends JsonResource
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
            "id"          => $this->id,
            "name"        => $this->name,
            "is_true"     => $this->is_true,
            "content"     => $this->money,
            "size"        => $this->size,
            "type"        => $this->type,
            "information" => $this->information,
            "description" => $this->description,
            "function"    => $this->function,
            "image"       => $this->storage_url($this->image),
            "big_image"   => $this->getUrls($this->big_image),
        ];
    }
}

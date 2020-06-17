<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SlidesResource extends JsonResource
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
            'id'            => $this->id,
            'titre'         => $this->title,
            'body'          => $this->body,
            'description'   => $this->excerpt,
            'image'         => asset('storage/'.$this->image),
            'dateCreation'  => $this->created_at
        ];
    }
}

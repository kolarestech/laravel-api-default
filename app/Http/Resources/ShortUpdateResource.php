<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ShortUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'description' => $this->description,
            'url' => $this->url,
            'creator_identify' => $this->creator_identify,
            'date_created' => $this->created_at,
            'date_updated' => $this->updated_at
        ];
    }
}

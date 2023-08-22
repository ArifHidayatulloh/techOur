<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameListResource extends JsonResource
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
            'id'  => $this->id,
            'competition_id' => $this->competition_id,
            'image' => $this->image,
            'tournament' => $this->tournament,
            'date' => date('d F Y', strtotime($this->date)),
            'fee' => $this->registration_fee,
            'competition_category' => $this->whenLoaded('competition')
        ];
    }
}

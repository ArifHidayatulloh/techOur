<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamListResource extends JsonResource
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'tournament_id' => $this->tournament_id,
            'team' => $this->team,
            'member' => $this->member,
            'contact' => $this->contact,
            'status' => $this->status,
            'image' => $this->image,
            'tournament_name' => $this->whenLoaded('tournament')
        ];
    }
}

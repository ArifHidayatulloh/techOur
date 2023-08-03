<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TournamentDetailResource extends JsonResource
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
            'competition_id' => $this->competition_id,
            'tournament' => $this->tournament,
            'date' => $this->date,
            'location' => $this->location,
            'participants' => $this->participants,
            'challenges' => $this->challenges,
            'image' => $this->image,
            'prizes' => $this->prizes,
            'competition_category' => $this->whenLoaded('competition'),
            'team_total' => $this->whenLoaded('teams', function(){
                return $this->teams->count();
            })
        ];
    }
}

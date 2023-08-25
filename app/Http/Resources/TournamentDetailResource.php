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
        if ($this->info_team == 1) {
            $team_total = $this->approvedTeam();
        }
        else{
            $team_total = null;
        }
        return [
            'id' => $this->id,
            'competition_id' => $this->competition_id,
            'tournament' => $this->tournament,
            'date' => date('d F Y', strtotime($this->data)),
            'location' => $this->location,
            'participants' => $this->participants,
            'challenges' => $this->challenges,
            'prizes' => $this->prizes,
            'contact' => $this->contact,
            'registration_fee' => $this->registration_fee,
            'image' => $this->image,
            'competition_category' => $this->whenLoaded('competition'),
            'info_team' => $team_total
            
            
        ];
    }
}

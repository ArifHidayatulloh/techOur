<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tournament extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','competition_id','tournament','date','location','participants','challenges','prizes','contact','registration_fee','info_team','image'];
    

    public function maker(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function competition(){
        return $this->belongsTo(Competition::class,'competition_id','id');
    }

    /**
     * Get all of the team for the Tournament
     *
     * @return \Illuminate\DatabTeamquent\Relatournament_idny
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class, 'tournament_id', 'id');
    }

    public function approvedTeam(){
        return $this->teams()->where('status','terdaftar')->count();
    }

}

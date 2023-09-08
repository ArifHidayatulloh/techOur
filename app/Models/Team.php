<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','tournament_id','team','member','contact','status','image'];
    public function tournament(){
        return $this->belongsTo(Tournament::class,'tournament_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    
}

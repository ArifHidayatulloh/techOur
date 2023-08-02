<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $fillable = ['tournament_id','team','member','image'];
    public function tournament(){
        return $this->belongsTo(Tournament::class,'tournament_id','id');
    }
}

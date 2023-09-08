<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeamListResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team' => 'required',
            'member' => 'required',
            'contact' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $imagePath = $request->file('image')->store('team_images', 'public');

        $user_id = $request->user()->id;
        $team = Team::create([
            'user_id' => $user_id,
            'tournament_id' => $request->tournament_id, 
            'team' => $request->team,
            'member' => $request->member,
            'contact' => $request->contact,
            'status' => 'menunggu',
            'image' => $imagePath
        ]);

        return new TeamListResource($team->loadMissing(['tournament:id,tournament']), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

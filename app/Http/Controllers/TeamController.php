<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tournamentid)
    {
        $team = Team::where('tournament_id',$tournamentid)->where('status','terdaftar')->get();
        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('team.create', [
            'tournament' => Tournament::all()
        ]);
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
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $imagePath = $request->file('image')->store('team_images','public');

        Team::create([
            'tournament_id' => $request->tournament_id,
            'team' => $request->team,
            'member' => $request->member,
            'image' => $imagePath
        ]);

        return redirect()->route('team.index')->with('success','Added Team Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tournamentid)
    {
        $team = Team::where('tournament_id',$tournamentid)->where('status','terdaftar')->get();
        return view('admin.team.index', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('team.edit',[
            'team' => $team,
            'tournament' => Tournament::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
            'tournament_id' => 'required',
            'team' => 'required',
            'member' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if($request->hasFile('image')){
            Storage::disk('public')->delete($team->image);
            $imagePath = $request->file('image')->store('team_images','public');
            $team->image = $imagePath;
        }

        $team->tournament_id = $request->tournament_id;
        $team->team = $request->team;
        $team->member = $request->member;

        $team->save();

        return redirect()->route('team.index')->with('success','Updated Team Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        Storage::disk('public')->delete($team->image);
        $team->delete();
        return redirect()->back()->with('success','Deleted Team Successfully');
    }
}

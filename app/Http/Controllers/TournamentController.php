<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\Tournament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competition = Competition::all();
        return view('admin.tournament.index',compact('competition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tournament.create', [
            'competition' => Competition::all()
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
            'user_id' => 'required',
            'competition_id' => 'required',
            'tournament' => 'required',
            'date' => 'required',
            'location' => 'required',
            'participants' => 'required',
            'challenges' => 'required',
            'prizes' => 'required',
            'contact' => 'required',
            'registration_fee' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $imagePath = $request->file('image')->store('tournament_images','public');

        Tournament::create([
            'user_id' => $request->user_id,
            'competition_id' => $request->competition_id,
            'tournament' => $request->tournament,
            'date' => $request->date,
            'location' => $request->location,
            'participants' => $request->participants,
            'challenges' => $request->challenges,
            'prizes' => $request->prizes,
            'contact' => $request->contact,
            'registration_fee' => $request->registration_fee,
            'info_team' => $request->has('info_team'),
            'image' => $imagePath
        ]);

        return redirect()->route('tournament.index')->with('success','Added Tournament Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($competitionId)
    {
        if(Auth::user()->role == 'admin'){
            $tournament = Tournament::where(['competition_id' => $competitionId])->get();
        }else{
            $tournament = Tournament::where(['competition_id' => $competitionId, 'user_id' => Auth::user()->id])->get();
        }
        return view('admin.tournament.tour-lengkap', compact('tournament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('admin.tournament.edit',[
            'tournament' => $tournament,
            'competition' => Competition::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $request->validate([
            'competition_id' => 'required',
            'tournament' => 'required',
            'date' => 'required',
            'location' => 'required',
            'participants' => 'required',
            'challenges' => 'required',
            'prizes' => 'required',
            'contact' => 'required',
            'registration_fee' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if($request->hasFile('image')){
            Storage::disk('public')->delete($tournament->image);
            $imagePath = $request->file('image')->store('tournament_images','public');
            $tournament->image = $imagePath;
        }

        
        $tournament->competition_id = $request->competition_id;
        $tournament->tournament = $request->tournament;
        $tournament->date = $request->date;
        $tournament->location = $request->location;
        $tournament->participants = $request->participants;
        $tournament->challenges = $request->challenges;
        $tournament->prizes = $request->prizes;
        $tournament->contact = $request->contact;
        $tournament->info_team = $request->has('info_team');
        $tournament->registration_fee = $request->registration_fee;

        $tournament->save();

        return redirect()->route('tournament.index')->with('success','Updated Tournament Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        Storage::disk('public')->delete($tournament->image);
        $tournament->delete();
        return redirect()->route('tournament.index')->with('success','Deleted Tournament Successfully');
    }
}

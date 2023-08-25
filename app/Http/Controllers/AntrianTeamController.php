<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\Storage;

class AntrianTeamController extends Controller
{
    public function show($tournamentId) {
        $team = Team::where('tournament_id',$tournamentId)->where('status','menunggu')->get();
        // return view('admin.team.team-approve', compact('team'));
        return view('admin.team.team-approve', ['team' => $team, 'tournamentId' => $tournamentId]);
    }

    public function update($id){
        $team = Team::find($id);

        $team->where('id', $id)->update(array('status' => 'terdaftar'));

        return redirect()->back()->with('success','Berhasil Approved');
    }

    public function destroy($id){
        $team = Team::find($id);
        Storage::disk('public')->delete($team->image);
        $team->delete();
        return redirect()->back()->with('success','Deleted Team Successfully');
    }
}

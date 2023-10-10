<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competition = Competition::all();
        return view('admin.competition.index',compact('competition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.competition.create');
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
            'competition' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $imagePath = $request->file('image')->store('competition_images','public');

        Competition::create([
            'competition' => $request->competition,
            'image' => $imagePath
        ]);

        return redirect()->route('competition.index')->with('success','Competition added Successfully');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competition $competition)
    {
        return view('admin.competition.edit',compact('competition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competition $competition)
    {
        $request->validate([
            'competition' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if($request->hasFile('image')){
            Storage::disk('public')->delete($competition->image);
            $imagePath = $request->file('image')->store('competition_images','public');
            $competition->image = $imagePath;
        }

        $competition->competition = $request->competition;
        $competition->save();

        return redirect()->route('competition.index')->with('success','Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competition $competition)
    {
        Storage::disk('public')->delete($competition->image);
        $competition->delete();
        return redirect()->route('competition.index')->with('success','Competition deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit = Limit::all();
        $editLimit = Limit::all();
        return view('admin.list-paket.index',compact('limit'));
    }

    public function buyLimit(Request $request){
        $request->validate([
            'name' => 'required',
            'limit' => 'required',
            'prize' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        $imagePath = $request->file('image')->store('payment_images', 'public');

        History::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'limit' => $request->limit,
            'prize' => $request->prize,
            'image' => $imagePath,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Buying limit success. Wait approve from admin');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'name' => 'required',
            'limit' => 'required',
            'prize' => 'required',
        ]);

        Limit::create([
            'name'=> $request->name,
            'limit'=> $request->limit,
            'prize'=> $request->prize,
        ]);

        return redirect()->back()->with('successAdd','Limit added successfully');
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
    public function edit($id)
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
        $limit = Limit::find($id);
        $limit->delete();

        return redirect()->back()->with('success','Deleted Limit Successfully');
    }
}

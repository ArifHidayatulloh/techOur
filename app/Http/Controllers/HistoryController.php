<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $history = History::all()->where('status','pending');
        return view('admin.list-paket.approve',compact('history'));
    }

    public function approve($id){
        $history = History::find($id);

        $history->where('id',$id)->update(array('status' => 'success'));
        
        return redirect()->back()->with('success','Approved successfully');
    }
    public function fail($id){
        $history = History::find($id);

        $history->where('id',$id)->update(array('status' => 'failed'));
        
        return redirect()->back()->with('success','Deleted successfully');
    }
}

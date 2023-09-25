<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $news = News::all()->where('status','sukses');
        } else {
            $news = News::where('user_id', Auth::user()->id)->get();
        }
        return view('admin.news.index', compact('news'));
    }
    
    public function pending(){
        $news = News::all()->where('status','menunggu');

        return view('admin.news.news-approved', compact('news'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'news' => News::all()
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
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'

        ]);

        $imagePath = $request->file('image')->store('news_images', 'public');

        News::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,
            'status' => 'menunggu',
            'image' => $imagePath
        ]);

        return redirect()->route('news.index')->with('success', 'Added News Successfully');
    }

    public function approved($id){
        $news = News::find($id);

        $news->where('id',$id)->update(array('status' => 'sukses'));
        
        return redirect()->back()->with('success','News Approved Success');
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
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'date' => 'required',
            'content' => 'required',
            // 'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);

        if ($request->hasFile('image') != null) {
            Storage::disk('public')->delete($news->image);
            $imagePath = $request->file('image')->store('news_images', 'public');
            $news->image = $imagePath;
            $news->title = $request->title;
            $news->date = $request->date;
            $news->content = $request->content;
            $news->save();
        }
        else{
            $news->title = $request->title;
            $news->date = $request->date;
            $news->content = $request->content;
            $news->save();
        }


        return redirect()->route('news.index')->with('success', 'Updated News Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        Storage::disk('public')->delete($news->image);
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Deleted News Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

use Auth;
use Session;

class NewsController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //List all the available news
        $news = News::orderby('id', 'desc')->paginate(5); //show only 5 items at a time in descending order
        
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
        ]);
        
        $title = $request['title'];
        $body = $request['body'];
        
        $news = News::create($request->only('title', 'body'));
        
        //Display a successful message upon save
        return redirect()->route('news.index')
        ->with('flash_message', 'Article,
             '. $news->title.' created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find news of id = $id
        $news = News::findOrFail($id);
        
        return view ('news.show', compact('news'));
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
        $news = News::findOrFail($id);
        
        return view('news.edit', compact('news'));
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
        $this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);
        
        $news = News::findOrFail($id);
        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->save();
        
        return redirect()->route('news.show',
            $news->id)->with('flash_message',
                'Article, '. $news->title.' updated');
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
        $news = News::findOrFail($id);
        $news->delete();
        
        return redirect()->route('news.index')
        ->with('flash_message',
            'News entry successfully deleted');
        
    }
}

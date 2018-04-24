<?php

namespace App\Http\Controllers;

use App\ArtPiece;
use Illuminate\Http\Request;

use Auth;
use Session;

class ArtPieceController extends Controller
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
        //List all the available pieces of art
        $artpieces = ArtPiece::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in descending order
        
        return view('artpieces.index', compact('artpieces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('artpieces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate fields
        $this->validate($request, [
            'title'=>'required|max:100',
            'description' =>'required',
            'type' =>'required',
            'artist' =>'required',
            'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',                       
        ]);
        //Get the client's image filename        
        $filename = $request['filename']->getClientOriginalName();
        
        //Move the file to /img within the public folder
        $request['filename']->move(public_path('img'), $filename);        
        
        //Add the items to the database        
        $artpieces = ArtPiece::create([
            'title' => request('title'),
            'description' => request('description'),
            'type' => request('type'),
            'artist' => request('artist'),
            'price' => request('price'),
            'filename' => $filename
        ]);
        
        //Display a successful message upon save
        return redirect()->route('artpieces.index')
        ->with('flash_message', 'New item , '. $artpieces->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Find ArtPieces of id = $id
        $artpiece = ArtPiece::findOrFail($id);
        
        
        return view ('artpieces.show', compact('artpiece'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $artPiece = ArtPiece::findOrFail($id);
        
        return view('artpieces.edit', compact('artPiece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title'=>'required|max:100',
            'description' =>'required',
            'type' =>'required',
            'artist' =>'required',
            'price' =>'required',
            'filename' => 'required',
        ]);
        
        $artPiece = ArtPiece::findOrFail($id);
        $artPiece->title = $request->input('title');
        $artPiece->description = $request->input('description');
        $artPiece->type = $request->input('type');
        $artPiece->artist = $request->input('artist');
        $artPiece->price = $request->input('price');
        $artPiece->filename = $request->input('filename');
        $artPiece->save();
        
        return redirect()->route('artpieces.show',
            $artPiece->id)->with('flash_message',
                'Article, '. $artPiece->title.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArtPiece  $artPiece
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        
        $artPiece = ArtPiece::findOrFail($id);
        $artPiece->delete();
        
        return redirect()->route('artpieces.index')
        ->with('flash_message', 'Item successfully deleted');
    }
}

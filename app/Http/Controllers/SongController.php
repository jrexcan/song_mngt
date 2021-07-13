<?php

namespace App\Http\Controllers;

use App\Song;
use Exception;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $songs = Song::all();
        return view('components.songs.index',['songs'=>$songs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('components.songs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'title' => 'required',
            'artist' =>'required',
            'lyrics' => 'required'
        ]);
        

        if(!$validator){
            return response('Validation Error.',$validator->errors());
        }
        try{
            $input = $request->all();
            Song::create($input);

            $songs = Song::all();
            return view('components.songs.index',['songs'=>$songs]);
        }
        catch(Exception $e){
            return response()->json($e);
        }
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
        // $song= Song::find($id);
        // return view('components.songs.form');
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
        $song= Song::whereId($id)->first();
        // return $song;
        return view('components.songs.edit',compact('song',$song));
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
        $validator = $request->validate([
            'title' => 'required',
            'artist' =>'required',
            'lyrics' => 'required'
        ]);
        

        if(!$validator){
            return response('Validation Error.',$validator->errors());
        }
        try{
            $input = $request->except(['_token','_method']);
            Song::whereId($id)->update($input);

            $songLists = Song::all();
            return view('components.songs.index',['songs'=>$songLists]);
        }
        catch(Exception $e){
            return response()->json($e);
        }
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
        Song::whereId($id)->delete();
        $songLists = Song::all();
        return view('components.songs.index',['songs'=>$songLists]);
    }
}

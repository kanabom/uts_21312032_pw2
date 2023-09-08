<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\Genre;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index',compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('Film.create', compact('genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $film = new Film;

        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre' => 'required',
        ]);

        $film->judul=$request->judul;
        $film->ringkasan=$request->ringkasan;
        $film->tahun=$request->tahun;
        $film->poster=$request->poster;
        $film->genre_id=$request->genre_id;

        $simpan = $film->save();

        if($simpan){
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal ditambah');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::where('id',$id)->first();

        return view('film.edit', compact('film'));
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
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required',
            'genre_id' => 'required',
        ]);

        $film->judul=$request->judul;
        $film->ringkasan=$request->ringkasan;
        $film->tahun=$request->tahun;
        $film->poster=$request->poster;
        $film->genre_id=$request->genre_id;

        $ubah = $film->save();

        if($ubah){
            Alert::success('Success', 'Data Berhasil diupdate');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal diupdate');
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
        $film = Film::find($id);
       
        $hapus = $film->delete();

        if($hapus){
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/film');
        }else{
            Alert::error('Failed', 'Data Gagal dihapus');
        }
        return redirect('/film');
    }
}

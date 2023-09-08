<?php

namespace App\Http\Controllers;

use App\Models\film;
use App\Models\peran;
use App\Models\cast;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = Peran::all();
        return view('peran.index',compact('peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $film = Film::all();
        return view('Peran.create', compact('film'));

        $cast = Cast::all();
        return view('Peran.create', compact('cast'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran = new Peran;

        $request->validate([
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $peran->film_id=$request->film_id;
        $peran->cast_id=$request->cast_id;
        $peran->nama=$request->nama;


        $simpan = $peran->save();

        if($simpan){
            Alert::success('Success', 'Data Berhasil ditambah');
            return redirect('/peran');
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
        $peran = Peran::where('id',$id)->first();

        return view('peran.edit', compact('peran'));
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
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $peran->film_id=$request->film_id;
        $peran->cast_id=$request->cast_id;
        $peran->nama=$request->nama;

        $ubah = $peran->save();

        if($ubah){
            Alert::success('Success', 'Data Berhasil diupdate');
            return redirect('/peran');
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
        $peran = Peran::find($id);
       
        $hapus = $peran->delete();

        if($hapus){
            Alert::success('Success', 'Data Berhasil dihapus');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data Gagal dihapus');
        }
        return redirect('/peran');
    }
}

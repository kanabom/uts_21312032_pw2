@extends('layout.master')

@section('judul')
Tambah Film
@endsection

@section('content')
<form method="post" action="/film">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="" class="form-control">
    </div>
    @error('judul')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror

    <div class="form-group">
        <label>Ringkasan</label>
        <textarea class="form-control" name="ringkasan"> </textarea>
    </div>
    @error('ringkasan')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label>Tahun</label>
        <input type="text" name="tahun" value="" class="form-control">
    </div>
    @error('tahun')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label>Poster</label>
        <input type="text" name="poster" value="" class="form-control">
    </div>
    @error('poster')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label>Genre</label>
        <select value="form-control" name="Genre">
        <option value="">Pilih Genre</option>
        @forelse ($genre as $key => $item)
            <option value="{{$item['id']}}">{{$item['nama']}}</option>
        @empty
        @endforelse
        </select>
    </div>
    @error('genre_id')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror



    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
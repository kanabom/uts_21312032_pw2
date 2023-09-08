@extends('layout.master')

@section('judul')
Tambah Peran
@endsection

@section('content')
<form method="post" action="/peran">
    @csrf
    <div class="form-group">
        <label>Film</label>
        <select value="form-control" name="film">
        <option value="">Pilih Film</option>
        @forelse ($film as $key => $item)
            <option value="{{$item['id']}}">{{$item['judul']}}</option>
        @empty
        @endforelse
        </select>
    </div>
    @error('film_id')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label>Cast</label>
        <select value="form-control" name="Cast">
        <option value="">Pilih Cast</option>
        @forelse ($cast as $key => $item)
            <option value="{{$item['id']}}">{{$item['nama']}}</option>
        @empty
        @endforelse
        </select>
    </div>
    @error('cast_id')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="nama" value="" class="form-control">
    </div>
    @error('nama')
        <div class="alert alert-denger">{{$message}}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection
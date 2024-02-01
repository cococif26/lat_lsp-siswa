@extends('layout.main')
@section('content')
    <div class="container-form">
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/mapel/update/{{ $mapel->id }}" method="post">
            @csrf
            <label for="nama_mapel">Nama mapel</label>
            <input type="text" name="nama_mapel" id="nama_mapel" value="{{ $mapel->nama_mapel }}">

            <button type="submit" class="button-submit">Simpan</button>
        </form>
    </div>
@endsection

@extends('layout.main')
@section('content')
    <div class="container-form">
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/kelas/update/{{ $kelas->id }}" method="post">
            @csrf
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                <option></option>
                @foreach ($tingkat_kelas as $k)
                    <option value="{{ $k }}" @selected($kelas->kelas == $k)>{{ $k }}</option>
                @endforeach
            </select>

            <label for="jurusan">Jurusan</label>
            <select name="jurusan" id="jurusan">
                <option></option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j }}" @selected($kelas->jurusan == $j)>{{ $j }}</option>
                @endforeach
            </select>

            <label for="rombel">Rombel</label>
            <input type="number" name="rombel" id="rombel" max="4" min="1" value="{{ $kelas->rombel }}">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection

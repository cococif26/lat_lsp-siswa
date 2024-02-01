@extends('layout.main')
@section('content')
    <div class="container-form">
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/guru/update/{{ $guru->id }}" method="post">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" value="{{ $guru->nip }}">

            <label for="nama_guru">Nama siswa</label>
            <input type="text" name="nama_guru" id="nama_guru" value="{{ $guru->nama_guru }}">

            <label for="jk">Jenis kelamin</label>
            <input type="radio" name="jk" id="jk" value="L" {{ $guru->jk == 'Laki-laki' ? 'checked' : '' }}> Laki-laki
            <input type="radio" name="jk" id="jk" value="P" {{ $guru->jk == 'Perempuan' ? 'checked' : '' }}> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5">{{ $guru->alamat }}</textarea>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ $guru->password }}">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection

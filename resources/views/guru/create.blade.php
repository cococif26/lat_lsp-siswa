@extends('layout.main')
@section('content')
    <div class="container-form">
        @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

        <form action="/guru/store" method="post">
            @csrf
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip">

            <label for="nama_guru">Nama guru</label>
            <input type="text" name="nama_guru" id="nama_guru">

            <label for="jk">Jenis kelamin</label>
            <input type="radio" name="jk" id="jk" value="L"> Laki-laki
            <input type="radio" name="jk" id="jk" value="P"> Perempuan

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5"></textarea>

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection

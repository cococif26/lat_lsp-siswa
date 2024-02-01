@extends('layout.main')
@section('content')
    <div class="container-form">
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger">{{ $error }}</span>
        @endforeach
        @endif

        <form action="/siswa/store" method="post">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis">

            <label for="nama_siswa">Nama siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa">

            <label for="jk">Jenis kelamin</label>
            <input type="radio" name="jk" id="jk" value="L">Laki-laki
            <input type="radio" name="jk" id="jk" value="P">Perempuan

            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                <option></option>
                @foreach ($kelas as $kel)
                    <option value="{{ $kel->id }}">{{ $kel->kelas }} {{ $kel->jurusan }} {{ $kel->rombel }}</option>
                @endforeach
            </select>

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5"></textarea>

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection

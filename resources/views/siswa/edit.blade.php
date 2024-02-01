@extends('layout.main')
@section('content')
    <div class="container-form">
        @if($errors->any())
        @foreach ($errors->all() as $error)
            <span class="alert alert-danger">{{ $error }}</span>
        @endforeach
        @endif

        <form action="/siswa/update/{{ $siswa->id }}" method="post">
            @csrf
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" value="{{ $siswa->nis }}">

            <label for="nama_siswa">Nama siswa</label>
            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ $siswa->nama_siswa }}">

            <label for="jk">Jenis kelamin</label>
            <input type="radio" name="jk" id="jk" value="L" {{ $siswa->jk == 'Laki-laki' ? 'checked' : '' }}>Laki-laki
            <input type="radio" name="jk" id="jk" value="P" {{ $siswa->jk == 'Perempuan' ? 'checked' : '' }}>Perempuan

            <label for="kelas">Kelas</label>
            <select name="kelas_id" id="kelas_id">
                <option></option>
                @foreach ($kelas as $kel)
                    <option value="{{ $kel->id }}" @selected($siswa->kelas_id == $kel->id)>{{ $kel->kelas }} {{ $kel->jurusan }} {{ $kel->rombel }}</option>
                @endforeach
            </select>

            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" rows="5">{{ $siswa->alamat }}</textarea>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ $siswa->password }}">

            <button class="button-submit" type="submit">Simpan</button>
        </form>
    </div>
@endsection

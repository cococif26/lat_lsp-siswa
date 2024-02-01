<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index', [
            'siswa' => Siswa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric', 'unique:siswas'],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'kelas_id' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        Siswa::create($data_siswa);
        return redirect('/siswa/index')->with('success', 'Data siswa berhasil ditambah');
    }


    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', [
            'siswa' => $siswa,
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $data_siswa = $request->validate([
            'nis' => ['required', 'numeric', 'unique:siswas,nis,'.$siswa->id],
            'nama_siswa' => ['required'],
            'jk' => ['required'],
            'kelas_id' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        $siswa->update($data_siswa);
        return redirect('/siswa/index')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $nilai = Nilai::where('siswa_id', $siswa->id)->first();
        if($nilai){
            return back()->with('error', "Data $siswa->nama_siswa sedang digunakan di menu nilai");
        }
        $siswa->delete();
        return redirect('/siswa/index')->with('success', 'Data siswa berhasil di hapus');
    }
}

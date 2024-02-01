<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mengajar;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric', 'unique:gurus'],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        Guru::create($data_guru);
        return redirect('/guru/index')->with('success', 'Data guru berhasil disimpan');
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => ['required', 'numeric', 'unique:gurus,nip,'.$guru->id],
            'nama_guru' => ['required'],
            'jk' => ['required'],
            'alamat' => ['required'],
            'password' => ['required']
        ]);
        $guru->update($data_guru);
        return redirect('/guru/index')->with('success', 'Data guru berhasil ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();
        if($mengajar){
            return back()->with('error', "$guru->nama_guru masih digunakan di menu mengajar");
        }
        $guru->delete();
        return redirect('/guru/index')->with('success', 'Data guru berhasil dihapus');
    }
}

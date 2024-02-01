<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tingkat_kelas = ['10', '11', '12', '13'];
        $jurusan = ['RPL', 'SIJA', 'TKJ', 'MM', 'DPIB', 'BKP', 'TOI', 'TKR', 'TP', 'TFLM'];
        return view('kelas.create', [
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);

        $kelas = Kelas::firstOrNew($data_kelas);
        if($kelas->exists){
            return back()->with('error', 'data kelas sudah ada');
        }
        else {
            $kelas->save();
            return redirect('/kelas/index')->with('success', 'Data berhasil ditambahkan');
        }
    }

    public function edit(Kelas $kelas)
    {
        $tingkat_kelas = ['10', '11', '12', '13'];
        $jurusan = ['RPL', 'SIJA', 'TKJ', 'MM', 'DPIB', 'BKP', 'TOI', 'TKR', 'TP', 'TFLM'];
        return view('kelas.edit', [
            'kelas' => $kelas,
            'tingkat_kelas' => $tingkat_kelas,
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'kelas' => ['required'],
            'jurusan' => ['required'],
            'rombel' => ['required']
        ]);
        $cek_kelas = Kelas::where('kelas', $request->kelas)->where('jurusan', $request->jurusan)->where('rombel', $request->rombel)->first();
        if($cek_kelas){
            return back()->with('error', 'data kelas sudah ada');
        }
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data kelas berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();

        if($mengajar || $siswa){
            return back()->with('error', "$kelas->kelas $kelas->jurusan $kelas->rombel masih digunakan di menu mengajar dan siswa");
        }
        $kelas->delete();
        return redirect('kelas/index')->with('success', 'Data kelas berhasil dihapus');
    }
}

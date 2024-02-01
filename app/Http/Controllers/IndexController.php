<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        return view('home');
    }
    public function index(){
        return view('index');
    }

    public function loginAdmin(Request $request){
        $admin = Admin::where('id_admin', $request->id_admin)->where('password', $request->password)->first();

        if(!$admin){
            return back()->with('error', 'kode admin dan password salah');
        }
        session([
            'role' => 'admin',
            'id_admin' => $admin->id_admin,
            'id' => $admin->id
        ]);
        return redirect('/home');
    }

    public function loginGuru(Request $request){
        $guru = Guru::where('nip', $request->nip)->where('password', $request->password)->first();

        if(!$guru){
            return back()->with('error', 'NIP dan password salah');
        }
        session([
            'role' => 'guru',
            'nama_guru' => $guru->nama_guru,
            'id_guru' => $guru->id_guru
        ]);
        return redirect('/home');
    }

    public function loginSiswa(Request $request){
        $siswa = Siswa::where('nis', $request->nis)->where('password', $request->password)->first();

        if(!$siswa){
            return back()->with('error', 'NIS dan password salah');
        }
        session([
            'role' => 'siswa',
            'nama_siswa' => $siswa->nama_siswa,
            'id_siswa' => $siswa->id_siswa
        ]);
        return redirect('/home');
    }

    public function logout(Request $request){
        $request->session()->invalidate();
        return redirect('/');
    }
}

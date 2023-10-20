<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class PpdbController extends Controller
{
    public function index(Request $request) {
        $DataPpdb = Ppdb::when(!empty($request->search_ppdb), function($query) use($request) {
            $query->where('nis', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('nama', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('tempat_lahir', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('tanggal_lahir', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('alamat', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('asal_sekolah', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('kelas', 'like', '%' . $request->search_ppdb . '%')
            ->orWhere('jurusan', 'like', '%' . $request->search_ppdb . '%');
        })->paginate(4);

        return view('ppdb', ['ppdb' => $DataPpdb]);
    }
    
    public function tambah(Request $request) {
        $this->validate($request, [
            'nis' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $check = Ppdb::where('nis', $request->nis)->count() > 0;
        if($check){
            return redirect('ppdb')->with('alert', ['bg' => 'warning', 'message' => 'Data NIS sudah terdaftar!']);
        }
        $check2 = Ppdb::where('nama', $request->nama)->count() > 0;
        if($check2){
            return redirect('ppdb')->with('alert', ['bg' => 'warning', 'message' => 'Data Nama Siswa sudah terdaftar!']);
        }

        $ppdb = new Ppdb();
        $ppdb->nis = $request->nis;
        $ppdb->nama = $request->nama;
        $ppdb->jenis_kelamin = $request->jenis_kelamin;
        $ppdb->tempat_lahir = $request->tempat_lahir;
        $ppdb->tanggal_lahir = $request->tanggal_lahir;
        $ppdb->alamat = $request->alamat;
        $ppdb->asal_sekolah = $request->asal_sekolah;
        $ppdb->kelas = $request->kelas;
        $ppdb->jurusan = $request->jurusan;

        $ppdb->save();
        return redirect('ppdb')->with('alert', ['bg' => 'success', 'message' => 'Berhasil ditambah']);
    }

    public function edit(Ppdb $ppdb, Request $request) {
        $ppdb->nis = $request->nis;
        $ppdb->nama = $request->nama;
        $ppdb->jenis_kelamin = $request->jenis_kelamin;
        $ppdb->tempat_lahir = $request->tempat_lahir;
        $ppdb->tanggal_lahir = $request->tanggal_lahir;
        $ppdb->alamat = $request->alamat;
        $ppdb->asal_sekolah = $request->asal_sekolah;
        $ppdb->kelas = $request->kelas;
        $ppdb->jurusan = $request->jurusan;

        $ppdb->save();
        return redirect('ppdb')->with('alert', [
            'bg' => 'success', 
            'message' => 'Berhasil diubah'
        ]);
    }

    public function hapus(Ppdb $ppdb) {
        $ppdb->delete();
        return redirect('ppdb')->with('alert', [
            'bg' => 'success', 
            'message' => 'Berhasil dihapus'
        ]);
    }
}

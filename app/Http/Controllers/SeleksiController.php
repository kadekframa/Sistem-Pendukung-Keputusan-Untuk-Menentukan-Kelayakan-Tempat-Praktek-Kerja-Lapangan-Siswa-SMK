<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Seleksi;

use App\Models\Master_siswa;
use App\Models\Master_industri;
use App\Models\Master_bobot;

class SeleksiController extends Controller
{
    public function index()
    {
    	$title = 'Analisa Data Kelayakan';
    	$data = Seleksi::orderBy('tahun_angkatan','asc')->get();

    	return view('seleksi.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Seleksi';
    	$siswa = Master_siswa::orderBy('id','asc')->get();
    	$thn_angkatan = Master_siswa::orderBy('id','asc')->get();
    	$industri = Master_industri::orderBy('nama_industri','asc')->get();

    	return view('seleksi.add', compact('title','siswa','thn_angkatan','industri'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		 'siswa' => 'required',
    		 'tahun_angkatan' => 'required',
    		 'industri' => 'required',
    		 'kesesuaian_pekerjaan' => 'required',
    		 'fasilitas' => 'required',
    		 'durasi_bekerja' => 'required',
    		 'keaktifan_industri' => 'required'
    	]);

    	$data = $request->except(['_token','_method']);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

        $bobot = 0.5;
        $kesesuaian_pekerjaan = $request->kesesuaian_pekerjaan;

        $nilai = $bobot * $kesesuaian_pekerjaan;

        $data['nilai'] = $nilai;


    	//dd($data);
    	Seleksi::insert($data);

    	\Session::flash('sukses','Data Berhasil Ditambah');
    	return redirect('seleksi');
    }

    public function edit($id)
    {
    	$title = 'Edit Data Seleksi';
    	$siswa = Master_siswa::get();
    	$industri = Master_industri::get();

    	$dt = Seleksi::find($id);

    	return view('seleksi.edit', compact('title','siswa','industri','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request, [
    		 'siswa' => 'required',
    		 'tahun_angkatan' => 'required',
    		 'industri' => 'required',
    		 'kesesuaian_pekerjaan' => 'required',
    		 'fasilitas' => 'required',
    		 'durasi_bekerja' => 'required',
    		 'keaktifan_industri' => 'required'
    	]);

    	$data = $request->except(['_token','_method']);
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

        $bobot = 0.4;
        $kesesuaian_pekerjaan = $request->kesesuaian_pekerjaan;
        $nilai = $bobot * $kesesuaian_pekerjaan;

        $data['nilai'] = $nilai;

    	Seleksi::where('id',$id)->update($data);

    	\Session::flash('sukses','Data Berhasil Ditambah');
    	return redirect('seleksi');
    }
}

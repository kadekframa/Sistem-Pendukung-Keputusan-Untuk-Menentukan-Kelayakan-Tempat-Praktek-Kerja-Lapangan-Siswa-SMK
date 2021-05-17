<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master_siswa;

class SiswaController extends Controller
{
    public function index()
    {
    	$title = 'Master Data Siswa';
    	$data = Master_siswa::orderBy('nama','asc')->get();

    	return view('siswa.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Siswa';

    	return view('siswa.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'nis' => 'required',
    		'tgl_lahir' => 'required',
    		'alamat' => 'required',
    		'tahun_angkatan' => 'required'
    	]);

    	$data = $request->except(['_token']);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	
    	//dd($data);
    	Master_siswa::insert($data);

    	\Session::flash('sukses','Data Berhasil Ditambah');
    	return redirect('siswa');
    }

    public function edit($id)
    {
    	$title = 'Edit Data Siswa';
    	$dt = Master_siswa::find($id);

    	return view('siswa.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'nama' => 'required',
    		'nis' => 'required',
    		'tgl_lahir' => 'required',
    		'alamat' => 'required',
    		'tahun_angkatan' => 'required'
    	]);

    	$data = $request->except(['_token','_method']);
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	
    	//dd($data);
    	Master_siswa::where('id',$id)->update($data);

    	\Session::flash('sukses','Data Berhasil Diupdate');
    	return redirect('siswa');
    }

    public function delete($id)
    {
    	try {
    		Master_siswa::where('id',$id)->delete();

    		\Session::flash('sukses','Data Berhasil Dihapus');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}
    	return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master_bobot;

class BobotkriteriaController extends Controller
{
    public function index()
    {
    	$title = 'Data Bobot Kriteria';
    	$data = Master_bobot::orderBy('id','asc')->get();

    	return view('bobotkriteria.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Bobot Kriteria';

    	return view('bobotkriteria.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'kriteria' => 'required',
    		'bobot' => 'required'
    	]);

    	$data = $request->except(['_token']);
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	// dd($data);
    	Master_bobot::insert($data);

    	\Session::flash('sukses','Data Berhasil Ditambah');
    	return redirect('bobotkriteria');
    }

    public function edit($id)
    {
    	$title = 'Edit Data Bobot Kriteria';
    	$dt = Master_bobot::find($id);

    	return view('bobotkriteria.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
    		'kriteria' => 'required',
    		'bobot' => 'required'
    	]);

    	$data = $request->except(['_token','_method']);
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Master_bobot::where('id',$id)->update($data);
    	\Session::flash('sukses','Data Berhasil Diupdate');

    	return redirect('bobotkriteria');
    }

    public function delete($id)
    {
    	try {
    		Master_bobot::where('id',$id)->delete();
    		\Session::flash('sukses','Data Berhasil Dihapus');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect('bobotkriteria');
    }
}

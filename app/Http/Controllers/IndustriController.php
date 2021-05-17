<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master_industri;

class IndustriController extends Controller
{
    public function index()
    {
    	$title = 'Master Data Industri';
    	$data = Master_industri::orderBy('nama_industri','asc')->get();

    	return view('industri.index',compact('title', 'data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Tempat PKL';

    	return view('industri.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nama_industri' => ' required',
    		'no_telepon' => ' required',
    		'alamat' => ' required'

    	]);

    	$a['nama_industri'] = $request->nama_industri;
    	$a['no_telepon'] = $request->no_telepon;
    	$a['alamat'] = $request->alamat;
    	$a['created_at'] = date('Y-m-d H:i:s');
    	$a['updated_at'] = date('Y-m-d H:i:s');

    	Master_industri::insert($a);\Session::flash('sukses','Data Berhasil Ditambah');

    	return redirect('industri');
    }

    public function edit($id)
    {
        $title = 'Edit Data Tempat PKL';
        $dt = Master_industri::find($id);

        return view('industri.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_industri' => ' required',
            'no_telepon' => ' required',
            'alamat' => ' required'

        ]);

        $a['nama_industri'] = $request->nama_industri;
        $a['no_telepon'] = $request->no_telepon;
        $a['alamat'] = $request->alamat;
        //$a['created_at'] = date('Y-m-d H:i:s');
        $a['updated_at'] = date('Y-m-d H:i:s');

        Master_industri::Where('id',$id)->update($a);
        \Session::flash('sukses','Data Berhasil Diupdate');

        return redirect('industri');
    }

    public function delete($id)
    {
        try {
            Master_industri::where('id',$id)->delete();
            \Session::flash('sukses','Data Berhasil Dihapus');
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('industri');
    }
}

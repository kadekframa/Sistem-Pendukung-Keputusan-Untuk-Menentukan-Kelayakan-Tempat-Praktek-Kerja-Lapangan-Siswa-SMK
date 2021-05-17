<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Biodata;
use App\Models\Master_industri;
use App\User;

use PDF;

class BiodataController extends Controller
{
    public function index()
    {
    	$title = 'Update Biodata';
    	$dt = Biodata::where('users',\Auth::user()->id)->first();
    	$cek = Biodata::where('users',\Auth::user()->id)->count();
    	$industri = Master_industri::orderBy('nama_industri','asc')->get();

    	return view('biodata.index', compact('title','dt','cek','industri'));
    }

    public function store(Request $request,$id)
    {
    	$this->validate($request,[
            'tahun_angkatan' => 'required',
    		'no_hp' => 'required',
    		'tempat_lahir' => 'required',
    		'tgl_lahir' => 'required',
    		'alamat' => 'required',
    		'industri' => 'required'
    	]);

        $file = $request->file('ktp');
        if($file){
            $file->move('uploads', $file->getClientOriginalName());
            $data['ktp'] = 'uploads/'.$file->getClientOriginalName();
        }

        $file = $request->file('cv');
        if($file){
            $file->move('uploads', $file->getClientOriginalName());
            $data['cv'] = 'uploads/'.$file->getClientOriginalName();
        }

    	$data['users'] = $id;
        $data['tahun_angkatan'] = $request->tahun_angkatan;
    	$data['no_hp'] = $request->no_hp;
    	$data['alamat'] = $request->alamat;
    	$data['tempat_lahir'] = $request->tempat_lahir;
    	$data['tgl_lahir'] = $request->tgl_lahir;
    	$data['industri'] = $request->industri;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
        $data['status'] = '1';
        $data['status_penilaian'] = '1';

    	Biodata::insert($data);

    	\Session::flash('sukses','Data Berhasil Dilengkapi');

    	return redirect()->back();
    }

    public function update(Request $request,$id)
    {
    	$this->validate($request,[
            'tahun_angkatan' => 'required',
    		'no_hp' => 'required',
    		'tempat_lahir' => 'required',
    		'tgl_lahir' => 'required',
    		'alamat' => 'required',
    		'industri' => 'required'
    	]);

        $file = $request->file('ktp');
        if($file){
            $file->move('uploads', $file->getClientOriginalName());
            $data['ktp'] = 'uploads/'.$file->getClientOriginalName();
        }

        $file = $request->file('cv');
        if($file){
            $file->move('uploads', $file->getClientOriginalName());
            $data['cv'] = 'uploads/'.$file->getClientOriginalName();
        }

    	// $data['users'] = $id;
        $data['tahun_angkatan'] = $request->tahun_angkatan;
    	$data['no_hp'] = $request->no_hp;
    	$data['alamat'] = $request->alamat;
    	$data['tempat_lahir'] = $request->tempat_lahir;
    	$data['tgl_lahir'] = $request->tgl_lahir;
    	$data['industri'] = $request->industri;
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
        $data['status'] = '1';
        $data['status_penilaian'] = '1';

    	Biodata::where('users', $id)->update($data);

    	\Session::flash('sukses','Data Berhasil Diupdate');

    	return redirect()->back();
    }
    
    public function cetak()
    {
        try {
            $dt = User::where('id',\Auth::user()->id)->with('biodata_r')->first();
            $pht = User::first();
            $pdf = PDF::loadview('biodata.pdf', compact('dt','pht'))->setPaper('a4','landscape');
            return $pdf->stream();
            
        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }

        return redirect()->back();
    }
}

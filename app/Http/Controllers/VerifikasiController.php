<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Master_industri;
use App\Models\Biodata;
use App\Models\Status;

class VerifikasiController extends Controller
{
    public function listDaftarSiswaPkl()
    {
    	$title = 'Request Siswa PKL';
    	$data = Biodata::orderBy('id','asc')->get();

    	return view('requestpkl.index', compact('title','data'));
    }

    public function naikkanstatus($id)
    {
    	try {
    		$biodata = Biodata::find($id);
    		$id_status = $biodata->status;
    		$urutan_status = $biodata->status_r->urutan;

    		$urutan_baru = $urutan_status + 1;
    		$status_baru = Status::where('urutan',$urutan_baru)->first();

    		Biodata::where('id',$id)->update([
    			'status'=>$status_baru->id
    		]);
    		
    		\Session::flash('sukses','Data Telah Berhasil Divalidasi');
    	} catch (Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect()->back();
    }



}

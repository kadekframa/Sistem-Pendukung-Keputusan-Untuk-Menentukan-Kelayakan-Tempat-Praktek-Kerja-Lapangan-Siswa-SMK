<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Statuspenilaian;

class StatuspenilaianController extends Controller
{
    public function index()
    {
    	$title = 'Data Status Penilaian';
    	$data = Statuspenilaian::orderBy('id','asc')->get();

    	return view('statuspenilaian.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Status Penilaian';

    	return view('statuspenilaian.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'status_penilaian' => 'required',
    		'urutan' => 'required'
    	]);

    	$data['status_penilaian'] = $request->status_penilaian;
    	$data['urutan'] = $request->urutan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Statuspenilaian::insert($data);

    	return redirect('statuspenilaian');
    }
}

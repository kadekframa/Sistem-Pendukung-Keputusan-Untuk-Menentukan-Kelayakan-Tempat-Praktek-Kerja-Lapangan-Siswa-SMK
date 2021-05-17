<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status;

class StatusController extends Controller
{
    public function index()
    {
    	$title = 'Data Status';
    	$data = Status::orderBy('id','asc')->get();

    	return view('status.index', compact('title','data'));
    }

    public function add()
    {
    	$title = 'Tambah Data Status';

    	return view('status.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
    		'status_data' => 'required',
    		'urutan' => 'required'
    	]);

    	$data['status_data'] = $request->status_data;
    	$data['urutan'] = $request->urutan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Status::insert($data);

    	return redirect('status');
    }
}

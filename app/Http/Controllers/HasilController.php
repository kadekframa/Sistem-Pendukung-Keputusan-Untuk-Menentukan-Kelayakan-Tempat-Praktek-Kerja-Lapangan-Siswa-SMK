<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Master_industri;
use App\Models\Biodata;

class HasilController extends Controller
{
    public function index()
    {
    	$title = 'Hasil Penilaian';
    	$data = Biodata::where('status_penilaian','2')->orderBy('tahun_angkatan','asc')->get();

    	return view('hasil.index',compact('title','data'));
    }

    public function detail($id)
    {
    	$title = 'Analisa Data Penilaian';
    	$data = Biodata::where('id',$id)->get();

    	return view('hasil.detail', compact('title','data'));
    }

}
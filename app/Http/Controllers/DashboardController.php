<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Biodata; 

class DashboardController extends Controller
{
    public function index()
    {
    	$title = 'Halaman Dashboard';


    	$user_id = \Auth::user()->id;
    	$cek = Biodata::where('users',$user_id)->count();
    	if($cek < 1){
    		$pesan = 'Mohon Melengkapi Persyaratan Terlebih Dahulu!';

    	}else{
    		$pesan = 'Persyaratan Sudah Dilengkapi.. Terima Kasih';
    	}


        



    	return view('dashboard.index', compact('title','pesan','cek'));
    }

}

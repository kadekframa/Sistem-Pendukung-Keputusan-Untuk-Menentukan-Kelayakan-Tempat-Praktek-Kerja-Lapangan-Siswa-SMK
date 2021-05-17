<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class PklController extends Controller
{
	public function index()
	{
		$title = 'Registrasi Praktek Kerja Lapangan';

		return view('pkl.index', compact('title'));
	}

	public function store(Request $request)
	{
		$this->validate($request,[
			'nama' => 'required',
			'nisn' => 'required',
			'email' => 'required'
		]);

		$data['name'] = $request->nama;
		$data['nisn'] = $request->nisn;
		$data['email'] = $request->email;
		$data['password'] = bcrypt('123');
		$data['id_registrasi'] = 'REG-'.date('YmdHis');

		//cek photo
		$file = $request->file('photo');
		if($file){
			$file->move('uploads', $file->getClientOriginalName());
			$data['photo'] = 'uploads/'.$file->getClientOriginalName();
		}

		User::insert($data);

		\Session::flash('berhasil','Selamat Pendaftaran Berhasil Dilakukan, Silahkan Masuk Halaman Login Untuk Melakukan Login Akun!');

		return redirect('Registrasi-pkl');
	}
}

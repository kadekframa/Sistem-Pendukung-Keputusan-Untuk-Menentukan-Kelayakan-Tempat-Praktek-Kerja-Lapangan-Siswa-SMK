<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route Admin
Route::get('create-admin', function(){
	\DB::table('users')->insert([
		'role'=>'1',
		'name'=>'admin',
		'nisn'=>'1',
		'email'=>'admin@frama.com',
		'id_registrasi'=>'-',
		'password'=>bcrypt('admin')
	]);
});

//Route Guru
Route::get('create-guru', function(){
	\DB::table('users')->insert([
		'role'=>'2',
		'name'=>'guru',
		'nisn'=>'2',
		'email'=>'guru@gmail.com',
		'id_registrasi'=>'-',
		'password'=>bcrypt('guru')
	]);
});


/*Route Frontend*/
Route::get('/', function () {
	$title = ' Selamat Datang ';
    return view('welcome', compact('title'));
});

Route::get('/Registrasi-pkl', 'PklController@index');
Route::post('/Registrasi-pkl', 'PklController@store');
/*--end Route Frontend*/




Auth::routes();

Route::get('/home', function(){
	return redirect('dashboard');
});





Route::group(['middleware'=>'auth'], function(){
//Route Manage Dashboard Peserta
	//list dashboar peserta
	Route::get('/dashboard','DashboardController@index');

//Route Biodata
	//lengkapi biodata
	Route::get('/biodata/', 'BiodataController@index');
	Route::post('/biodata/{users}', 'BiodataController@store');

	//Update biodata
	Route::put('/biodata/{users}', 'BiodataController@update');


//Route Cetak Pengajuan
	Route::get('/cetak-biodata','BiodataController@cetak');


//Route Siswa PKL
	//list siswa PKL
	Route::get('/siswapkl','SiswapklController@listSiswaPkl');
	
	Route::get('/penilaian/{id}','SiswapklController@add');
	Route::put('/penilaian/{id}','SiswapklController@berinilai');


//Router Hasil Analisa Penilaian
	Route::get('/hasil-analisa','HasilController@index');

	Route::get('/hasil-analisa/{id}','HasilController@detail');



//Route Daftar Siswa PKL
	//list Daftar Siswa PKL
	Route::get('/verifikasi','VerifikasiController@listDaftarSiswaPkl');

	//approve pengajuan pkl
	Route::get('/approve/{id}','VerifikasiController@naikkanstatus');
	// Route::get('/notify/{id}','DashboardController@index');




//Route Manage Status
	//list status
	Route::get('/status','StatusController@index');

	//create status
	Route::get('/status/add','StatusController@add');
	Route::post('/status/add','StatusController@store');


//Route Manage Status Penilaian
	//list status
	Route::get('/statuspenilaian','StatuspenilaianController@index');

	//create status
	Route::get('/statuspenilaian/add','StatuspenilaianController@add');
	Route::post('/statuspenilaian/add','StatuspenilaianController@store');



//Route Manage industri
	//list industri
	Route::get('/industri', 'IndustriController@index');

	//create industri
	Route::get('/industri/add','IndustriController@add');
	Route::post('/industri/add','IndustriController@store');

	//edit industri
	Route::get('/industri/{id}', 'IndustriController@edit');
	Route::put('/industri/{id}', 'IndustriController@update');

	//delete industri
	Route::delete('/industri/{id}', 'IndustriController@delete');

//Route Manage data siswa
	//list data siswa
	Route::get('/siswa','SiswaController@index');

	//create data siswa
	Route::get('/siswa/add','SiswaController@add');
	Route::post('/siswa/add','SiswaController@store');

	//edit data siswa
	Route::get('/siswa/{id}','SiswaController@edit');
	Route::put('/siswa/{id}','SiswaController@update');

	//delete data siswa
	Route::delete('/siswa/{id}','SiswaController@delete');

//Route Manage Bobot Kriteria
	//list bobot
	Route::get('/bobotkriteria','BobotkriteriaController@index');

	//create bobot
	Route::get('/bobotkriteria/add','BobotkriteriaController@add');
	Route::post('/bobotkriteria/add','BobotkriteriaController@store');

	//edit bobot
	Route::get('/bobotkriteria/{id}','BobotkriteriaController@edit');
	Route::put('/bobotkriteria/{id}','BobotkriteriaController@update');

	//delete bobot
	Route::delete('bobotkriteria/{id}','BobotkriteriaController@delete');

//Route Seleksi Kelayakan
	//list seleksi
	Route::get('/seleksi','SeleksiController@index');

	//create seleksi
	Route::get('/seleksi/add','SeleksiController@add');
	Route::post('/seleksi/add','SeleksiController@store');

	//edit seleksi
	Route::get('/seleksi/{id}','SeleksiController@edit');
	Route::put('/seleksi/{id}','SeleksiController@update');

	//delete seleksi
	Route::delete('/seleksi/{id}','SeleksiController@delete');


});








Route::get('/keluar', function(){
	\Auth::logout();

	return redirect('/login');
});
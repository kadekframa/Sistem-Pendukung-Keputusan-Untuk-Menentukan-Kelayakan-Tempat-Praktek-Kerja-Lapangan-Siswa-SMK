<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Master_industri;
use App\Models\Biodata;

class SiswapklController extends Controller
{
    public function listSiswaPkl()
    {
        $title = 'Data Siswa PKL';
        $data = Biodata::where('status','2')->get();



        return view('siswapkl.index', compact('title','data'));
    }

    public function add($id)
    {
        $title = 'Berikan Penilaian';

        $dt = Biodata::find($id);

        return view('penilaian.add', compact('title','dt'));
    }

    public function berinilai(Request $request,$id)
    {
        $this->validate($request,[
            'kesesuaian_pekerjaan' => 'required',
            'fasilitas' => 'required',
            'durasi_bekerja' => 'required',
            'keaktifan_industri' => 'required',
            'penggunaan_bhsinggris' => 'required'
        ]);

        // $data['users'] = $id;
        $data['kesesuaian_pekerjaan'] = $request->kesesuaian_pekerjaan;
        $data['fasilitas'] = $request->fasilitas;
        $data['durasi_bekerja'] = $request->durasi_bekerja;
        $data['keaktifan_industri'] = $request->keaktifan_industri;
        $data['penggunaan_bhsinggris'] = $request->penggunaan_bhsinggris;
        $data['status_penilaian'] = '2';
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['bobot_k1'] = '1';
        $data['bobot_k2'] = '2';
        $data['bobot_k3'] = '3';
        $data['bobot_k4'] = '4';
        $data['bobot_k5'] = '5';


/*KONVERSI DATA SUBKRITERIA*/
        //Konversi data K1
        $kesesuaian_pekerjaan = $request->kesesuaian_pekerjaan;
        if($kesesuaian_pekerjaan < '10'){
            $konversi_k1 = 'Tidak Sesuai';

        }else if($kesesuaian_pekerjaan <= '20'){
            $konversi_k1 = 'Sesuai';

        }else if($kesesuaian_pekerjaan > '20'){
            $konversi_k1 = 'Sangat Sesuai';
        }

        //Konversi data K2
        $fasilitas = $request->fasilitas;
        if($fasilitas < '5'){
            $konversi_k2 = 'Tidak Lengkap';

        }else if($fasilitas > '4'){
            $konversi_k2 = 'Lengkap';

        }

        //Konversi data K3
        $durasi_bekerja = $request->durasi_bekerja;
        if($durasi_bekerja < '4'){
            $konversi_k3 = 'Malas';

        }else if($durasi_bekerja < '7'){
            $konversi_k3 = 'Rajin';

        }else if($durasi_bekerja > '6'){
            $konversi_k3 = 'Sangat Rajin';
        }

        //Konversi data K4
        $keaktifan_industri = $request->keaktifan_industri;
        if($keaktifan_industri < '30'){
            $konversi_k4 = 'Tidak Aktif';

        }else if($keaktifan_industri < '40'){
            $konversi_k4 = 'Kurang Aktif';

        }else if($keaktifan_industri == '40'){
            $konversi_k4 = 'Aktif';

        }else if($keaktifan_industri > '40'){
            $konversi_k4 = 'Sangat Aktif';
        }

        //Konversi data K5
        $penggunaan_bhsinggris = $request->penggunaan_bhsinggris;
        if($penggunaan_bhsinggris < '4'){
            $konversi_k5 = 'Tidak';

        }else if($penggunaan_bhsinggris >= '4'){
            $konversi_k5 = 'Iya';
        }


        $data['k1'] = $konversi_k1;
        $data['k2'] = $konversi_k2;
        $data['k3'] = $konversi_k3;
        $data['k4'] = $konversi_k4;
        $data['k5'] = $konversi_k5;

/* END KONVERSI DATA SUBKRITERIA */




/* KONVERSI DATA NILAI SUBKRITERIA */


        $nilaik1 = $konversi_k1;
        if($nilaik1 == 'Tidak Sesuai'){
            $put_nilaik1 = '1';

        }else if($nilaik1 == 'Sesuai'){
            $put_nilaik1 = '2';

        }else if($nilaik1 >= 'Sangat Sesuai'){
            $put_nilaik1 = '3';
        }


        $nilaik2 = $konversi_k2;
        if($nilaik2 == 'Tidak Lengkap'){
            $put_nilaik2 = '1';

        }else if($nilaik2 == 'Lengkap'){
            $put_nilaik2 = '2';
        }


        $nilaik3 = $konversi_k3;
        if($nilaik3 == 'Malas'){
            $put_nilaik3 = '1';

        }else if($nilaik3 == 'Rajin'){
            $put_nilaik3 = '2';

        }else if($nilaik3 >= 'Sangat Rajin'){
            $put_nilaik3 = '3';
        }


        $nilaik4 = $konversi_k4;
        if($nilaik4 == 'Tidak Aktif'){
            $put_nilaik4 = '1';

        }else if($nilaik4 == 'Kurang Aktif'){
            $put_nilaik4 = '2';

        }else if($nilaik4 == 'Aktif'){
            $put_nilaik4 = '3';

        }else if($nilaik4 == 'Sangat Aktif'){
            $put_nilaik4 = '4';
        }

        $nilaik5 = $konversi_k5;
        if($nilaik5 == 'Tidak'){
            $put_nilaik5 = '1';

        }else if($nilaik5 == 'Iya'){
            $put_nilaik5 = '2';
        }



        $data['nilaik1'] = $put_nilaik1;
        $data['nilaik2'] = $put_nilaik2;
        $data['nilaik3'] = $put_nilaik3;
        $data['nilaik4'] = $put_nilaik4;
        $data['nilaik5'] = $put_nilaik5;

/* END KONVERSI DATA NILAI SUBKRITERIA */



/* NORMALISASI DATA NILAI */

        $normalk1 = $put_nilaik1;
        $put_normalk1 = $normalk1/3;

        $normalk2 = $put_nilaik2;
        $put_normalk2 = $normalk2/2;

        $normalk3 = $put_nilaik3;
        $put_normalk3 = $normalk3/3;

        $normalk4 = $put_nilaik4;
        $put_normalk4 = $normalk4/4;

        $normalk5 = $put_nilaik5;
        $put_normalk5 = $normalk5/2;

        $data['normalk1'] = $put_normalk1;
        $data['normalk2'] = $put_normalk2;
        $data['normalk3'] = $put_normalk3;
        $data['normalk4'] = $put_normalk4;
        $data['normalk5'] = $put_normalk5;

/* END NORMALISASI DATA NILAI */



/* NILAI AKHIR */

        $endk1 = $put_normalk1;
        $put_endk1 = $endk1 * 0.4;

        $endk2 = $put_normalk2;
        $put_endk2 = $endk2 * 0.2;

        $endk3 = $put_normalk3;
        $put_endk3 = $endk3 * 0.1;

        $endk4 = $put_normalk4;
        $put_endk4 = $endk4 * 0.25;

        $endk5 = $put_normalk5;
        $put_endk5 = $endk5 * 0.05;

        $data['endk1'] = $put_endk1;
        $data['endk2'] = $put_endk2;
        $data['endk3'] = $put_endk3;
        $data['endk4'] = $put_endk4;
        $data['endk5'] = $put_endk5;

/* END NILAI AKHIR */



/* HITUNG RESULTS */

        $resultk1 = $put_endk1;
        $resultk2 = $put_endk2;
        $resultk3 = $put_endk3;
        $resultk4 = $put_endk4;
        $resultk5 = $put_endk5;

        $RESULTS = $resultk1 + $resultk2 + $resultk3 + $resultk4 + $resultk5;

        $data['results'] = floor($RESULTS * 100).'%';
        
/* END HITUNG RESULTS */



/* HASIL PENILAIAN KELAYAKAN */

        $kategori = $RESULTS;
        if($kategori < '0.742'){
            $show = 'Tidak Layak';
        }else if($kategori >= '0.742'){
            $show = 'Layak';
        }

        $data['kategori'] = $show;

/* END HASIL PENILAIAN KELAYAKAN */



        Biodata::where('id', $id)->update($data);

        \Session::flash('sukses','Penilaian Berhasil!');

        return redirect('siswapkl');
    }
}

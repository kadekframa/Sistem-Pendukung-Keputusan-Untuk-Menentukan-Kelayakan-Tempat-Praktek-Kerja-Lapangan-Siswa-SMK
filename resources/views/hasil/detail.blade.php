@extends('layouts.master')
 
@section('content')
 
<div class="row" style="height: 750px;">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>


            <div class="box-body">

               <div class="panel">
                    <div id="chartNilai"></div>
               </div>

               @section('grafik')
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script>
                    Highcharts.chart('chartNilai', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Grafik Hasil Penilaian PKL Siswa'
                        },
                        subtitle: {
                            text: 'Semangat !!!'
                        },
                        xAxis: {
                            categories: [
                                'Jan',
                                'Feb',
                                'Mar'
                            ],
                            crosshair: true
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Rainfall (mm)'
                            }
                        },
                        tooltip: {
                            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                            footerFormat: '</table>',
                            shared: true,
                            useHTML: true
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Tokyo',
                            data: [49.9, 71.5, 106.4]

                        }, {
                            name: 'New York',
                            data: [83.6, 78.8, 98.5]

                        }, {
                            name: 'London',
                            data: [48.9, 38.8, 39.3]

                        }, {
                            name: 'Berlin',
                            data: [42.4, 33.2, 34.5]

                        }]
                    });
                </script>
                @endsection

            </div>



            <div class="box-body">

               <div class="table-responsive">
                  <table class="table">
                      <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>Tahun Angkatan</th>
                        <th>No HP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Pilihan industri</th>
                        <th>Status penilaian</th>
                        <th>Status</th>
                      </tr>
                    <tbody>
                      @foreach($data as $e=>$dt)
                        <tr>
                          <td>{{ $e+1 }}</td>
                          <td>{{ $dt->users_r->name }}</td>
                          <td>{{ $dt->tahun_angkatan }}</td>
                          <td>{{ $dt->no_hp }}</td>
                          <td>{{ $dt->tempat_lahir }}</td>
                          <td>{{ $dt->tgl_lahir }}</td>
                          <td>{{ $dt->alamat }}</td>
                          <td>{{ $dt->industri_r->nama_industri }}</td>
                          <td><a class="btn btn-success btn-xs"><i class="fa fa-check">{{ $dt->statuspenilaian_r->status_penilaian }}</i></a></td>
                          <td><a class="btn btn-primary btn-xs"><i class="fa fa-check">{{ $dt->status_r->status_data }}</i></a></td>

                        </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
               </div>

            </div>
        </div>
    </div>
</div>


 



    <div class="row">

        <div class="col-sm-4">
          <h4>Bobot Kriteria</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Bobot</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &emsp;&thinsp; :</td>
                              <td>0,4</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>0,2</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>0,1</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>0,25</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>0,05</td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      
        <div class="col-sm-4">
            <h4>Inputan Nilai Yang Diberikan</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &emsp;&thinsp; :</td>
                              <td>{{ $dt->kesesuaian_pekerjaan }}</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->fasilitas }}</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->durasi_bekerja }} jam</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->keaktifan_industri }}</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->penggunaan_bhsinggris }}</td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
            <h4>Konversi Data Nilai Berdasarkan Sub Kriteria</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &thinsp; &thinsp;  :</td>
                              <td>{{ $dt->k1 }}</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp; &thinsp;&thinsp;   :</td>
                              <td>{{ $dt->k2 }}</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp; &thinsp; &thinsp; :</td>
                              <td>{{ $dt->k3 }}</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;  :</td>
                              <td>{{ $dt->k4 }}</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;  :</td>
                              <td>{{ $dt->k5 }}</td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

    </div>


<div class="row">

        <div class="col-sm-4">
          <h4>Konversi Data Nilai Berdasarkan Nilai Sub Kriteria</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &emsp;&thinsp; :</td>
                              <td>{{ $dt->nilaik1 }}</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->nilaik2 }}</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->nilaik3 }}</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->nilaik4 }}</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->nilaik5 }}</td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      
        <div class="col-sm-4">
            <h4>Normalisasi Data Nilai</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &emsp;&thinsp; :</td>
                              <td>{{ $dt->normalk1 }}</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->normalk2 }}</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->normalk3 }}</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->normalk4 }}</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->normalk5 }}</td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

        <div class="col-sm-4">
            <h4>Pembobotan Data Matriks</h4>
            <div class="box box-success">
              <div class="box-body">

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                          <tr>
                            <th>Kriteria Penilaian</th>
                            <th>Nilai</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data as $e=>$dt)
                            <tr>
                              <td>Kesesuaian Pekerjaan yang diberikan &emsp;&thinsp; :</td>
                              <td>{{ $dt->endk1 }}</td>
                            </tr>
                            <tr>
                              <td>Fasilitas Penunjang  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->endk2 }}</td>
                            </tr>
                            <tr>
                              <td>Durasi Bekerja &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->endk3 }}</td>
                            </tr>
                            <tr>
                              <td>Keaktifan Industri &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->endk4 }}</td>
                            </tr>
                            <tr>
                              <td>Penggunaan Bahasa Inggris &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td>{{ $dt->endk5 }}</td>
                            </tr>
                            <tr>
                              <td><b>Jumlah Data Pembobotan</b> &emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp;:</td>
                              <td><b>{{ $dt->results }}</b></td>
                            </tr>
                            <tr>
                              <td><b>Kategori Kelayakan</b> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;&thinsp;&thinsp;&thinsp; :</td>
                              <td><b><a class="btn btn-success btn-xl"><i class="fa fa-check">PKL {{ $dt->kategori }}</i></a></b></td>
                            </tr>

                            @endforeach
                          
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>

    </div>










@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection
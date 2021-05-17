<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengajuan Praktek Kerja Lapangan</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
 
    <!-- <link rel="stylesheet" href="{{asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}"> -->
 
   
   
</head>
	<body>

		<div class="container">
            <center>
                <h1>BUKTI PENGAJUAN PESERTA PKL SMK NEGERI X <br>TAHUN AJARAN 2021</h1>
            </center>
 
            <hr>
            <br>

			<div class="row">
				<div class="col-md-12">
					<table class="table" align="center">
						<tbody>
                           <tr>
                             <th>Nama</th>
                             <td>:</td>
                             <td>{{ $dt->name }}</td>

                             <th>Thn Angkatan</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->tahun_angkatan }}</td>


                             <th>Pilihan Industri</th>
                             <td>:</td>
                             <td><i>{{ $dt->biodata_r->industri_r->nama_industri }}</i></td>
                           </tr>

                           <tr>
                             <th>NISN</th>
                             <td>:</td>
                             <td>{{ $dt->nisn }}</td>

                             <th>Email Siswa</th>
                             <td>:</td>
                             <td>{{ $dt->email }}</td>

                             <th>ID Registrasi</th>
                             <td>:</td>
                             <td><i>{{ $dt->id_registrasi }}</i></td>
                           </tr>

                           <tr>
                           	<th>No hp</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->no_hp }}</td>

                             <th>Tempat Lahir</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->tempat_lahir }}</td>


                             <th>Created At</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->created_at }}</td>
                           </tr>

                           <tr>
                             <th>Alamat</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->alamat }}</td>

                             <th>Tanggal Lahir</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->tgl_lahir }}</td>


                             <th>Updated At</th>
                             <td>:</td>
                             <td>{{ $dt->biodata_r->updated_at }}</td>
                           </tr>
                       </tbody>
					</table>
					
				</div>
			</div>
		</div>
   
	</body>
</html>
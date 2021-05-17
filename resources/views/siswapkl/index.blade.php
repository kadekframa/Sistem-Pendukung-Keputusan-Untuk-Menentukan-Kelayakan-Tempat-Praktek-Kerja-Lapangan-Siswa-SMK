@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

               <div class="table-responsive">
               		<table class="table myTable">
               			<thead>
	               			<tr>
                        <th>No</th>
	               				<th>Nama Siswa</th>
                        <th>Tahun Angkatan</th>
	               				<th>No HP</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
	               				<th>Alamat</th>
                        <th>Status</th>
                        <th>Pilihan industri</th>
                        <th>Status penilaian</th>
	               				<th>Action</th>
	               			</tr>
               			</thead>
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
                          <td><a class="btn btn-primary btn-xs"><i class="fa fa-check">{{ $dt->status_r->status_data }}</i></a></td>
                          <td>{{ $dt->industri_r->nama_industri }}</td>
                          <td><a class="btn btn-success btn-xs"><i>{{ $dt->statuspenilaian_r->status_penilaian }}</i></a></td><
               						<td>
               							<div style="width:60px">
               							<a href="{{ url('penilaian/'.$dt->id) }}" class="btn btn-warning btn-sm btn-edit" id="edit"><i class="fa fa-pencil-square-o">Berikan Penilaian</i></a>
               							</div>
               						</td>

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
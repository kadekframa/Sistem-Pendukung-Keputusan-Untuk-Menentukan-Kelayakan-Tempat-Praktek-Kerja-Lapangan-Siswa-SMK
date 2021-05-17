@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('/seleksi/add') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Data Seleksi</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                    <table class="table table-hover myTable">
                       <thead>
                           <th>No</th>
                           <th>Siswa</th>
                           <th>Tahun Angkatan</th>
                           <th>Industri</th>
                           <th>Action</th>
                       </thead>
                       <tbody>
                           @foreach($data as $e=>$dt)
                           <tr>
                               <td>{{ $e+1 }}</td>
                               <td>{{ $dt->siswa_r->nama }}</td>
                               <td>{{ $dt->tahun_angkatan_r->tahun_angkatan }}</td>
                               <td>{{ $dt->industri_r->nama_industri }}</td>
                               <td>
                                <div style="width:60px">
                                    <a href="{{ url('seleksi/'.$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                    <button href="{{ url('seleksi/'.$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
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
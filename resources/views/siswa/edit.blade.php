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

            </div>
            <div class="box-body">
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               <form role="form" method="post" action="{{ url('/siswa/'.$dt->id) }}">
                @csrf
                {{ method_field('PUT') }}
                  <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Siswa</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Siswa" value="{{ $dt->nama }}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">NIS</label>
                        <input type="number" name="nis" class="form-control" id="exampleInputPassword1" placeholder="Nomor Induk Siswa" value="{{ $dt->nis }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="exampleInputPassword1" placeholder="Tanggal Lahir" value="{{ $dt->tgl_lahir }}">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Alamat</label>
                        <textarea class="form-control" name="alamat" rows="5">{{ $dt->alamat }}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Tahun Angkatan</label>
                        <input type="number" name="tahun_angkatan" class="form-control" id="exampleInputPassword1" placeholder="Tahun Angkatan" value="{{ $dt->tahun_angkatan }}">
                      </div>
                    
                  </div>

                <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Update</button>
                </div>

              </form>

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
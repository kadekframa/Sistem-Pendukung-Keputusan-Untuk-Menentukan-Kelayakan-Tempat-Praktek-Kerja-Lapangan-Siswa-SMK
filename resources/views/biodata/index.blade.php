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

                @if($cek < 1)
                <form role="form" method="post" action="{{ url('biodata/'.\Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tahun Angkatan</label>
                      <input type="number" name="tahun_angkatan" class="form-control" id="exampleInputEmail1" placeholder="Siswa Angkatan ...">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No Hp</label>
                      <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="No Hp">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" id="exampleInputPassword1" placeholder="Tempat lahir">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="date" class="form-control datepicker" name="tgl_lahir" id="exampleInputPassword1" placeholder="Tgl Lahir" autocomplete="off2">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">alamat</label>
                      <textarea class="form-control" name="alamat" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Industri PKL :</label>
                      <select class="form-control select2" name="industri">
                        @foreach($industri as $inds)
                        <option value="{{ $inds->id }}">{{ $inds->nama_industri }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Scan KTP</label>
                      <input type="file" class="form-control" name="ktp" id="exampleInputPassword1" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Scan Foto CV</label>
                      <input type="file" class="form-control" name="cv" id="exampleInputPassword1" autocomplete="off">
                    </div>

              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            @else
            <form role="form" method="post" action="{{ url('biodata/'.\Auth::user()->id) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tahun Angkatan</label>
                      <input type="number" name="tahun_angkatan" class="form-control" id="exampleInputEmail1" placeholder="Siswa Angkatan ..." value="{{ $dt->tahun_angkatan }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">No Hp</label>
                      <input type="number" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="No Hp" value="{{ $dt->no_hp }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tempat Lahir</label>
                      <input type="text" class="form-control" name="tempat_lahir" id="exampleInputPassword1" placeholder="Tempat lahir" value="{{ $dt->tempat_lahir }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Tanggal Lahir</label>
                      <input type="datetime" class="form-control datepicker" name="tgl_lahir" id="exampleInputPassword1" placeholder="Tgl Lahir" autocomplete="off" value="{{ $dt->tgl_lahir }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">alamat</label>
                      <textarea class="form-control" name="alamat" rows="5">{{ $dt->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Industri PKL :</label>
                      <select class="form-control select2" name="industri">
                        @foreach($industri as $inds)
                        <option value="{{ $inds->id }}" {{ ($dt->industri == $inds->id)? 'selected' : '' }}>{{ $inds->nama_industri }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Scan Foto KTP</label>
                      <input type="file" class="form-control" name="ktp" id="exampleInputPassword1" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Scan Foto CV</label>
                      <input type="file" class="form-control" name="cv" id="exampleInputPassword1" autocomplete="off">
                    </div>

              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>

            @endif
            
               
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
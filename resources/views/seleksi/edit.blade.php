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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form role="form" method="post" accept="{{ url('/seleksi/'.$dt->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Siswa</label>
                      <select class="form-control select2" name="siswa">
                        @foreach($siswa as $ssw)
                        <option value="{{ $ssw->id }}" {{ ($dt->siswa == $ssw->id)? 'selected' : '' }}>{{ $ssw->nama }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Tahun Angkatan</label>
                      <select class="form-control select2" name="tahun_angkatan">
                        @foreach($siswa as $thn_angkt)
                        <option value="{{ $thn_angkt->id }}" {{ ($dt->tahun_angkatan == $thn_angkt->id)? 'selected' : '' }}>{{ $thn_angkt->tahun_angkatan }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Industri</label>
                      <select class="form-control select2" name="industri">
                        @foreach($industri as $inds)
                        <option value="{{ $inds->id }}" {{ ($dt->industri == $inds->id)? 'selected' : '' }}>{{ $inds->nama_industri }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kesesuaian Pekerjaan</label>
                      <input type="text" name="kesesuaian_pekerjaan" class="form-control" id="exampleInputEmail1" placeholder="Kesesuaian pekerjaan yang diberikan" value="{{ $dt->kesesuaian_pekerjaan }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Fasilitas Pendukung</label>
                      <input type="text" name="fasilitas" class="form-control" id="exampleInputPassword1" placeholder="Fasilitas pendukung" value="{{ $dt->fasilitas }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Durasi Bekerja</label>
                      <input type="text" name="durasi_bekerja" class="form-control" id="exampleInputPassword1" placeholder="Durasi Bekerja" value="{{ $dt->durasi_bekerja }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Keaktifan Industri</label>
                      <input type="text" name="keaktifan_industri" class="form-control" id="exampleInputPassword1" placeholder="Keaktifan industri dalam memberikan pelatihan" value="{{ $dt->keaktifan_industri }}">
                    </div>
                    
                  </div>
                  <!-- /.box-body -->
     
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
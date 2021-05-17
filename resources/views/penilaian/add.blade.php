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
                <h4>Penilaian siswa atas nama: <b>{{ $dt->users_r->name }}</b></h4>
            </div>
            <div class="box-body">

                
                <form role="form" method="post" action="{{ url('/penilaian/'.$dt->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Kesesuaian Pekerjaan</label>
                      <input type="number" name="kesesuaian_pekerjaan" class="form-control" id="exampleInputEmail1" placeholder="Kesesuaian pekerjaan yang diberikan" value="{{ $dt->kesesuaian_pekerjaan }}">
                      <p class="help-block"><i>Tidak Sesuai : 1 - 10, &emsp; Sesuai : 11 - 20, &emsp; Sangat Sesuai : 21 - 30</i></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Fasilitas</label>
                      <input type="number" name="fasilitas" class="form-control" id="exampleInputEmail1" placeholder="Fasilitas penunjang" value="{{ $dt->fasilitas }}">
                      <p class="help-block"><i>Tidak Lengkap : Kurang dari 5, &emsp; Lengkap : Lebih dari sama dengan 5</i></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Durasi Bekerja</label>
                      <input type="number" name="durasi_bekerja" class="form-control" id="exampleInputEmail1" placeholder="Durasi bekerja" value="{{ $dt->durasi_bekerja }}">
                      <p class="help-block"><i>Malas : Kurang dari 4 jam, &emsp; Rajin : 4 - 6 jam, &emsp; Sangat Rajin : Lebih dari 6 jam</i></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Keaktifan Industri</label>
                      <input type="number" class="form-control" name="keaktifan_industri" id="exampleInputPassword1" placeholder="Keaktifan Industri" value="{{ $dt->keaktifan_industri }}">
                      <p class="help-block"><i>Tidak Aktif : Kurang dari 30, &emsp; Kurang Aktif : kurang dari 40, &emsp; Aktif : 40 &emsp; Sangat Aktif : lebih dari 40 </i></p>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Penggunaan Bahasa Inggris</label>
                      <input type="number" class="form-control" name="penggunaan_bhsinggris" id="exampleInputPassword1" placeholder="Penggunaan Bahasa Inggris" value="{{ $dt->penggunaan_bhsinggris }}">
                      <p class="help-block"><i>Tidak  : Kurang dari 4, &emsp; Iya  : Lebih dari sama dengan 4</i></p>
                    </div>

              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
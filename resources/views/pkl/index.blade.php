@extends('layouts_front.master')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">

			@if(Session::has('berhasil'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Registrasi Sukses!</h4>
                    {{ Session::get('berhasil') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif

			<form role="form" method="post" action="{{ url('Registrasi-pkl') }}" enctype="multipart/form-data">
				@csrf
              <div>
                <CENTER>
                  <h1>---REGISTRASI PKL---</h1>
                </CENTER>
                <p>
                  <br><br><br>
                </p>
              </div>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Peserta</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Peserta PKL">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">NISN</label>
                  <input type="text" name="nisn" class="form-control" id="exampleInputPassword1" placeholder="NISN">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Email</label>
                  <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email">
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">Photo Peserta</label>
                  <input type="file" name="photo" id="exampleInputFile">
 
                  <p class="help-block">Max size file 10 mb.</p>
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
	

@endsection
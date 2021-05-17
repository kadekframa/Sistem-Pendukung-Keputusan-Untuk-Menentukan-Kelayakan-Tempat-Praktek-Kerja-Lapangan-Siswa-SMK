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
               <form role="form" method="post" action="{{ url('/bobotkriteria/add') }}">
                @csrf 
                  <div class="box-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Kriteria</label>
                        <input type="text" name="kriteria" class="form-control" id="exampleInputEmail1" placeholder="Kriteria">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Bobot</label>
                        <input type="text" name="bobot" class="form-control" id="exampleInputPassword1" placeholder="Bobot Kriteria">
                      </div>
                      
                  </div>

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
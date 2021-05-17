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
	               				<th>Status Penilaian</th>
	               				<th>Urutan</th>
                        <th>created_at</th>
	               			</tr>
               			</thead>
               			<tbody>
               				@foreach($data as $e=>$dt)
               					<tr>
               						<td>{{ $e+1 }}</td>
               						<td>{{ $dt->status_penilaian }}</td>
               						<td>{{ $dt->urutan }}</td>
                          <td>{{ $dt->created_at }}</td>
               						
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
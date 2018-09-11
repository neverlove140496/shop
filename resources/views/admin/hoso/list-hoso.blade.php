@extends('layouts.admin')
@section('title_layouts','Danh sách thành viên')
@section('content_layouts')

<div class="panel panel-default">
	<div class="panel-body">

	@if(Session::has('success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>{!! Session::get('success') !!}</p>
		</div>
	@endif
		@if(Session::has('error'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<p>{!! Session::get('error') !!}</p>
		</div>
	@endif	
	
		<div class="panel-body">
			<form action=""  class="form-inline" role="form">
				<div class="form-group">
					
		
					<input class="form-control" name="search" placeholder="Tên thành viên..." style="width:140px; height: 31px" >
				</div>
				<button type="submit" class="btn btn-sm btn-info">Lọc</button>
			</form>

		</div>
		
			<table class="table  table-striped table-hover">
		<thead>
			<tr>
				<th>Stt</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Gender</th>
				<th>Birthday</th>
				<th>Level</th>
				<th>Date</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
		@foreach($ho_so as $key =>$hs)	
			
				<tr>
					<td>{{ $key+1 }}</td>
					<td>{{ $hs->name }}</td>
					<td>{{ $hs->email }}</td>
					<td>{{ $hs->phone }}</td>
					<td>{{ $hs->address }}</td>
					<td>{{ $hs->gender }}</td>
					<td>{{ date('d-m-Y',strtotime( $hs->birthday)) }}</td>
					<td>{{ $hs->level }}</td>		
					<td>{{ date('d/m/y',strtotime($hs->created_at ))}}</td>
					<td>
						<a href="{{ route('update-hoso',['id'=>$hs->id])}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
						<a href="{{ route('delete-hoso',['id'=>$hs->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn chắc chắn chứ?')"> <i class="fa fa-trash"></i></a>
					</td>
				</tr>
			
		@endforeach
		</tbody>
	</table>
	
			{{ $ho_so->links() }}
	</div>
</div>
@stop()
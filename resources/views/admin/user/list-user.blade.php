@extends('layouts.admin')
@section('title_layouts','Danh sách tài khoản')
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
					
				<a href="{{ route('add-user')}}" class="btn btn-sm btn-primary">Thêm mới</a>
					<input class="form-control" name="search" placeholder="Tên tài khoản..." style="width:140px; height: 31px" >
				</div>
				<button type="submit" class="btn btn-sm btn-info">Lọc</button>
			</form>

		</div>
		
			<table class="table  table-striped table-hover">
		<thead>
			<tr>
				<th>Stt</th>
				<th>Họ và tên</th>
				<th>Email</th>
				<th>Password</th>
				
				<th>Ngày tạo</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
		@foreach($tai_khoan as $key=>$tk)	
			<tr>
				<td>{{ $key+1 }}</td>
				<td>{{ $tk->name }}</td>
				<td>{{ $tk->email }}</td>
				<td>{{ $tk->password }}</td>
				
				<td>{{ date('d/m/y',strtotime($tk->created_at ))}}</td>
				<td>
					<a href="{{ route('update-user',['id'=>$tk->id])}}" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
					<a href="{{ route('delete-user',['id'=>$tk->id])}}" class="btn btn-xs btn-danger" onclick="return confirm('Bạn chắc chắn chứ?')"> <i class="fa fa-trash"></i></a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>
	</div>
</div>
@stop()
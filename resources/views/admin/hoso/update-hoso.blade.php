@extends('layouts.admin')
@section('title_layouts','Cập nhật hồ sơ ')
@section('content_layouts')
	<div class="panel panel-default">
	

		<div class="panel-body">
			<a href="{{ route('hoso')}}" class="btn btn-sm btn-info">Back</a>
		</div>
		<div class="panel-body">	
		<form action="" method="POST" role="form">
		
		<div class="form-group">
			<label for="">Full name</label>
			<input type="text" class="form-control" name="name"  value="{{$ho_so->name}}" placeholder="Họ và tên">
		</div>
		@if($errors->has('name'))
		<div class="helper-box">
			<p>{{ $errors->first('name')}}</p>
		</div>
		@endif

		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" name="email"   value="{{$ho_so->email}}"  placeholder="Email">
		</div>
		@if($errors->has('email'))
		<div class="helper-box">
			<p>{{ $errors->first('email')}}</p>
		</div>
		@endif
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" class="form-control" name="password"  value="{{$ho_so->password}}" placeholder="Mật khẩu">
		</div>
		@if($errors->has('password'))
		<div class="helper-box">
			<p>{{ $errors->first('password')}}</p>
		</div>
		@endif
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label for="">Phone</label>
			<input type="text" class="form-control" name="phone"   value="{{$ho_so->phone}}" placeholder="Số điện thoại">
			</div>
		</div>
		@if($errors->has('phone'))
		<div class="helper-box">
			<p>{{ $errors->first('phone')}}</p>
		</div>
		@endif
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label for="">Address</label>
			<input type="text" class="form-control" name="address"   value="{{$ho_so->address}}"  placeholder="Địa chỉ">
			</div>
		</div>
		@if($errors->has('address'))
		<div class="helper-box">
			<p>{{ $errors->first('address')}}</p>
		</div>
		@endif
		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label for="">Gender</label>
				<div class="radio">
					<label>
						<input type="radio" name="gender" value="1" checked>
						Nam
					</label>
					<label>
						<input type="radio" name="gender"  value="2" >
						Nữ
					</label>
					<label>
						<input type="radio" name="gender"  value="3" >
						Khác
					</label>
				</div>
			</div>
		</div>
		@if($errors->has('gender'))
		<div class="helper-box">
			<p>{{ $errors->first('gender')}}</p>
		</div>
		@endif

		<div class="form-group">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<label for="">Birthday</label>
			<input type="date" class="form-control" name="birthday"   value="{{$ho_so->birthday}}" placeholder="Ngày sinh">
			</div>
		</div>
		@if($errors->has('birthday'))
		<div class="helper-box">
			<p>{{ $errors->first('birthday')}}</p>
		</div>
		@endif		
		{{ csrf_field() }}
		<div class="clearfix"></div>
		<button type="submit" class="btn btn-success">Cập nhật</button>
	</form>
	</div>
</div>
@stop()
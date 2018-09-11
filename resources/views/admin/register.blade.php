@extends('layouts.login')
@section('title', 'Đăng ký tài khoản')
@section('main')
			
				<form action="" method="POST" role="form">
					<label for=""><h4>Đăng ký tài khoản Admin</h4></label>
					<div class="form-group">
						<label for="">Họ và tên</label>
						<input type="text" class="form-control" name="name" placeholder="Họ và tên" value="{{old('name')}}">
					</div>

					@if($errors->has('name'))
						<div class="help-block">
							{{ $errors->first('name')}}
						</div>
					@endif
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" placeholder="Địa chỉ email" value="{{old('email')}}">
					</div>

					@if($errors->has('email'))
						<div class="help-block">
							{{ $errors->first('email')}}
						</div>
					@endif
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" name="password" placeholder="Mật khẩu" value="{{old('password')}}">
					</div>
					@if($errors->has('password'))
						<div class="help-block">
							{{ $errors->first('password')}}
						</div>
					@endif
					<div class="form-group">
						<label for="">Nhập lại Mật khẩu</label>
						<input type="password" class="form-control" name="comfirm_password" placeholder="Nhập lại mật khẩu" value="{{old('comfirm_password')}}">
					</div>
					@if($errors->has('comfirm_password'))
						<div class="help-block">
							{{ $errors->first('comfirm_password')}}
						</div>
					@endif
					
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary">Đăng ký</button>
				</form>
				<br/>
				<p>
				<a href="{{route('home')}}" class="label  label-success">Homepage</a> 
				</p>		
@stop()
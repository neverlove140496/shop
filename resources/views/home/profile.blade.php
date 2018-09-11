@extends('layouts.home')
@section('title','Profile')
@section('main')

<main class="ps-main">
  <div class="ps-content pt-80 pb-80">
    <div class="ps-container">
      <div class="ps-cart-listing">
        <table class="table ps-cart__table">
        </table>            
         
         <h1 style="text-align: center;">Thông tin tài khoản</h1>
         <br/>
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
                  <div class="col-md-6 col-md-offset-3"> 
                    <form action="" method="POST" role="form">
                      <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Họ và tên"
                        value="{{Auth::user()->name}}" 
                        >
                      </div>
                       @if($errors->has('name'))
                        <div class="help-block">
                            {{ $errors->first('name')}}
                        </div>
                    @endif
                      <div class="form-group" >
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Địa chỉ email"
                        value="{{Auth::user()->email}}" 
                        >
                      </div>
                      @if($errors->has('email'))
                        <div class="help-block">
                            {{ $errors->first('email')}}
                        </div>
                    @endif

                      <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                        
                        >
                      </div>
                       @if($errors->has('address'))
                        <div class="help-block">
                            {{ $errors->first('address')}}
                        </div>
                    @endif

                    <div class="form-group" >
                        <label for="">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Số điện thoại">
                      </div>
                         @if($errors->has('phone'))
                        <div class="help-block">
                            {{ $errors->first('phone')}}
                        </div>
                    @endif
                      <div class="form-group" >
                        <label for="">Gender</label>
                        
                        <select name="gender" id="input" class="form-control" required="required">
                          <option value="">Chọn giới tính</option>
                          <option value="men">Nam</option>
                          <option value="women">Nữ</option>
                          <option value="other">Khác</option>
                        </select>
                      </div>
                      @if($errors->has('gender'))
                        <div class="help-block">
                            {{ $errors->first('gender')}}
                        </div>
                    @endif

                      <div class="form-group" >
                        <label for="">Birthday</label>
                        <input type="date" class="form-control" name="birthday" placeholder="Birthday">
                      </div>
                         @if($errors->has('birthday'))
                        <div class="help-block">
                            {{ $errors->first('birthday')}}
                        </div>
                    @endif

                  </div>
                  {{ csrf_field()}}
                  <button type="submit" class="ps-btn ps-btn--fullwidth" style="width: 160px; height: 50px; margin-left: 43%;">Cập nhật</button>
                    
                </form>                                   
          </div>
        </div>
      </div>
     
    </main>
    	
@stop()

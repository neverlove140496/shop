@extends('layouts.admin')
@section('title_layouts','Cập nhật sản phẩm')
@section('content_layouts')
	
	<div class="panel panel-default">
			<div class="panel-body">
			<a href="{{ route('product')}}" class="btn btn-sm btn-info">Back</a>
		</div>
		<div class="panel-body">
			<form action="" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}

		<div class="col-md-6">
			<div class="form-group">
			<label for="">Tên sản phẩm</label>
			<input type="text" class="form-control" name="name" id="name" value="{{$san_pham->name}}" placeholder="Tên sản phẩm">
		</div>
		@if($errors->has('name'))
		<div class="helper-box">
			<p>{{ $errors->first('name') }}</p>
		</div>
		@endif
		</div>
		<div class="col-md-6">
			<div class="form-group">
			<label for="">Slug</label>
			<input type="text" class="form-control" name="slug" id="slug" value="{{$san_pham->slug}}" placeholder="đường dẫn tĩnh sản phẩm">
		</div>
		@if($errors->has('slug'))
		<div class="helper-box">
			<p>{{ $errors->first('slug') }}</p>
		</div>
		@endif
		</div>
		
		
	<div class="form-group" >
			
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<a href="#" class="thumbnail">
					<img src="{{url('uploads')}}/{{$san_pham->image}}" alt="">
				</a>
				<input type="file" name="upload_file">
			</div>
		</div>
	
		<div class="clearfix"></div>
		
		<div class="form-group">
			<label for="">Ảnh liên quan</label>
			
				@foreach($san_pham->images as $img)	
				<div class="row ">
						
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<a href="#" class="thumbnail">
							<img src="{{url('uploads')}}/{{$img->links}}" alt="">
						</a>
					</div>
					<div class="caption ">
						<a href="{{route('pro-del-img',['id'=>$img->id])}}" class="label label-xs label-primary">Xóa</a>
						<input type="file" name="old_image[{{$img->id}}]">
					</div>
					</div>

				@endforeach
		
		</div>

		<div class="form-group">
			<label for="">Thêm ảnh liên quan</label>
			<input type="file"  name="other_image[]" multiple>
		</div> 


	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="form-group">
			<label for="" style="">Loại sản phẩm</label>
			<select name="parent"  class="form-control">
				<option value="0">root</option>
				@foreach($cats as $cat_here)
				<?php $selected= ($san_pham->category_id == $cat_here->id) ? 'selected' : '' ?>
					<option value="{{ $cat_here->id }}" {{$selected}}>{{ $cat_here->name }}</option>
				@endforeach
			</select>
		
		</div>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		
		<div class="form-group">
			<label for="">Giá</label>
			<input type="text" class="form-control" name="price"   value="{{$san_pham->price}}"  placeholder="Giá sản phẩm">
		</div>
		@if($errors->has('price'))
		<div class="helper-box">
			<p>{{ $errors->first('price') }}</p>
		</div>
		@endif
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="form-group">
			<label for="">Giá khuyến mãi</label>
			<input type="text" class="form-control" name="sale_price" value="{{$san_pham->sale_price}}"  placeholder="Giá km sản phẩm">
		</div>
		@if($errors->has('sale_price'))
		<div class="helper-box">
			<p>{{ $errors->first('sale_price') }}</p>
		</div>
		@endif
	</div>

		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<div class="form-group">
			<label for="">Tình trạng sản phẩm</label>
			<select name="type"  class="form-control" required="required">
				<option value="new">Mới</option>
				<option value="normal">Cũ</option>
				<option value="other">Khác</option>
			</select>
		</div>
		@if($errors->has('type'))
		<div class="helper-box">
			<p>{{ $errors->first('type') }}</p>
		</div>
		@endif
		</div>
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">	
		<div class="form-group">
				<label for="">Màu sắc</label>
				@foreach($colors as $cl)
				<?php 
					$checked = in_array($cl->id,$att_array) ? 'checked' : '';
				 ?>
				<div class="checkbox" >
						<label>
							<input  name="color[]" type="checkbox" value="{{ $cl->id}}" {{$checked}}>
							{{ $cl->name}}
						</label>
				</div>
				@endforeach	
		</div>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">	
		<div class="form-group">
				<label for="">Kích thước</label>
				@foreach($sizes as $si)
				<?php 
					$checked = in_array($si->id,$att_array) ? 'checked' : '';
					

				 ?>
					<div class="checkbox">
							<label>
								<input   name="size[]" type="checkbox" value="{{ $si->id}}"  {{$checked}}>
								{{ $si->name}}
							</label>
					</div>
				@endforeach	
		</div>
	</div>
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">	
		<div class="form-group">
				<label for="">Chất liệu</label>
				@foreach($materials as $ma)
				<?php 
					$checked = in_array($ma->id,$att_array) ? 'checked' : '';
				 ?>
					<div class="checkbox" >
							<label>
								<input   name="material[]" type="checkbox" value="{{ $ma->id}}"  {{$checked}}>
								{{ $ma->name}}
							</label>
					</div>
				@endforeach	
		</div>
	</div>
	
	<div class="clearfix"></div>
		<div class="form-group">
			<label for="">Nội dung</label>
		
			<textarea name="description" id="desc" class="form-control" rows="3" required="required" >
					 {!! $san_pham->description!!}
			</textarea>	
		</div>
		
		@if($errors->has('description'))
		<div class="helper-box">
			<p>{{ $errors->first('description') }}</p>
		</div>
		@endif
		
		<button type="submit" class="btn btn-success">
		<?php 
			if(isset($att_array[]))
			{
				
			}
		 ?>
		Cập nhật</button>
	</form>
		</div>
	</div>
@stop()
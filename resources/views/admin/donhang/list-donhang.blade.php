@extends('layouts.admin')
@section('title_layouts','Danh sách đơn hàng')
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
	
		<!-- <div class="panel-body">
			<form action=""  class="form-inline" role="form">
				<div class="form-group">
					
					<a href="{{ route('add-hoso')}}" class="btn btn-sm btn-primary">Thêm mới</a>
					<input class="form-control" name="search" placeholder="Tên thành viên..." style="width:140px; height: 31px" >
				</div>
				<button type="submit" class="btn btn-sm btn-info">Lọc</button>
			</form>

		</div> -->
		
		<table class="table  table-striped table-hover">
		<thead>
			<tr>
				<th>Stt</th>
				<th>Tên khách hàng</th>	
				<th>Thanh toán</th>	
				<th>Giao hàng</th>	
				<th>Ghi chú</th>
				<th>Địa điểm</th>
				<th>Tổng tiền</th>
				<th>Ngày đặt</th>
				<th>Chi tiết</th>
				<th>Trạng thái</th>
				<th>Hành động</th>
			</tr>
		</thead>
		<tbody>
			@foreach($donhang as $k =>$dh)  
                  <tr>
                    <td>
                      {{$k+1}}
                    </td>
                    <td>
                      {{$dh->User1->name}}
                    </td>
                     <td>
                      {{$dh->payment}}
                    </td>
                     <td>
                      {{$dh->ship}}
                    </td>
                    <td>
                      {{$dh->note}}
                    </td>
                    <td>
                      {{$dh->address}}
                    </td>
                   <td>
                        {{number_format($dh->total_amount())}} vnđ
                    </td>
                   
                     <td> {{date('d/m/Y',strtotime($dh->created_at))}}</td>
                    
                     <td>
                     @if($dh->status==1)
                          <span class=" label label-warning"> Pending</span>
                      @else
                          <span class=" label label-success"> Approval</span>
                      @endif
                    </td>
                    <td>
                     <a class=" label label-primary" href="{{route('donhang_detail',['id'=>$dh->id])}}">Show</a>
                                                           
                    </td>
                    <td>
                    <a href="" class=" label label-success">Xuất HĐ</a>
					
					<a href="{{ route('delete-donhang',['id'=>$dh->id])}}" class="label label-danger" onclick="return confirm('Bạn chắc chắn chứ?')">Hủy </a>
                    </td>
                  </tr>
                @endforeach
		</tbody>
	</table>		
	
	</div>
	
</div>



@stop()
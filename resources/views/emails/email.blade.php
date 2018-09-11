<h3>Hi {{$name}}</h3>
<p>OrderId: #{{$order->id}}</p>
<p>Created date:{{ date(' h:m d/m/y',strtotime($order->created_at ))}}</p>
<h4><strong>Total: {{number_format($cart->total_amount)}} vnđ</strong></h4>
<p>
	<h4><strong>Chi tiết hóa đơn sản phẩm</strong></h4>
</p>
<table border="1" cellpadding="10" cellspacing="10">
	<tr>
		<th>Stt</th>
		<th>Tên sản phẩm</th>
		<th>Số lượng</th>
		<th>Giá</th>
	</tr>
	@foreach($cart->items as $k => $item)
		<tr>
			<th>{{$k++}}</th>
			<th>{{$item['name']}}</th>
			<th>{{$item['quantity']}}</th>
			<th>{{number_format($item['price'])}}</th>
			
		</tr>
	@endforeach
</table>
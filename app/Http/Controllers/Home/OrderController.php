<?php 
	namespace App\Http\Controllers\Home;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Customer;
	use App\Models\Product;
	use App\Models\Category;
	use App\Models\User;
	use App\Models\Order;
	use App\Models\Order_detail;
	use App\Helper\Cart;
	use View;
	use Auth;
	use App\Mail\SendMail;
	use Mail;

	class OrderController extends Controller
	{
		
		public function __construct()
		{	$this->middleware(function($request,$next)
			{

				View::share(
				[
					
		        	'cart' => new Cart()
		  	  	]);

				return $next($request);
			});
		}	

		public function order()
		{	
			return view('home.checkout');
			
		}

		public function post_order(Request $req,Cart $cart)
		{
			// $this->validate($req,
			// [
			// 	'payment_method' =>'required',
			// 	'shipping_method' =>'required'
			// ]);

			$req->merge(['user_id' =>Auth::id()]);
			
			$datas=[];
			
			// dd($cart->items);
			if($order=Order::create($req->all()))
			{

				foreach ($cart->items as $item) 
					{
						$datas[]=[

							'product_id' =>$item['id'],
							'price' =>$item['price'],
							'quantity' =>$item['quantity'],
							'order_id' =>$order->id,
						];
							
					}	
						if($datas)
							{
								if(Order_detail::insert($datas)){
									Mail::to(Auth::user()->email)->send(new SendMail($order));
									return redirect()->route('order-success')->with('success','Đặt hàng thành công!');
								}else{
									$order->delete();
									return redirect()->route('order-error')->with('error','Đặt hàng thất bại!');
								}
							}
					
			}else{

			}
		}


		public function order_history()
		{
			if(Auth::check())
			{
				$orders=Order::where('user_id',Auth::id())->get();
				return view('order.order-history',['orders'=>$orders]);
			}else
			{
				return view('home.errors.404');
			}
		}

		public function order_detail($id)
		{
			if(Auth::check())
			{
				$order_detail=Order::find($id);

				return view('order.order-detail',['order_detail'=>$order_detail]);
			}else
			{
				return view('home.errors.404');
			}
		}

		public function success(Cart $cart){
			
			$cart->clear();
			return view('order.order-success');
			
		}
		public function error(){
			echo'That bai';
		}
	}
 ?>
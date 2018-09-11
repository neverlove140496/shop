<?php 
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	use App\Models\Order_detail;
	use DB;
	/**
	 * 
	 */
	class Order extends Model
	{
		protected $table = 'orders';
		protected $fillable = [
			'user_id','payment','ship','address','note','status','created_at','updated_at'];
	
		public function total_amount()
		{
			$sum=Order_detail::where('order_id',$this->id)->select(DB::raw('sum(price*quantity)as total'))->first();
			return $sum['total'];
		}

		// 1 đơn hàng có nhiều chi tiết
		public function Detail()
		{
			return $this->hasMany('\App\Models\Order_detail','order_id','id');

		}
		//
		public function User1()
		{
			return $this->hasOne('\App\Models\User','id','user_id');
		}
		
	}
 ?>
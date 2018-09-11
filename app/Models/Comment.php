<?php 
	namespace App\Models;
	use Illuminate\Database\Eloquent\Model;
	/**
	 * 
	 */
	class Comment extends Model
	{
		protected $table = 'blog';
		protected $fillable = [
			'user_id','blog_id','content','created_at','updated_at'];
	

	//tim kiem
		// public function scopeSearch($query)
		// {
		// 	if(empty(request()->search))
		// 	{
		// 		return $query;
		// 	}
		// 	else
		// 	{
		// 		return $query->where('name','like','%'.request()->search.'%');
		// 	}	
		// }

	}

 ?>
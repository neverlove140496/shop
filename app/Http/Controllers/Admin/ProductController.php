<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use App\Models\Product;
	use App\Models\Category;
	use App\Models\Attribute;
	use App\Models\ProAttribute;
	use App\Models\ProImage;
	use Illuminate\Http\Request;
	class ProductController extends Controller
	{
		//danh sach
		public function get_product()
		{
		
			$pros=Product::search()->paginate(5);
			// dd($pros);
			return view('admin.product.list-pro',
				[
					'san_pham' => $pros,
					'cats' =>Category::all(),		
			]);
		}

		//them danh muc
		public function get_add()
		{
			return view('admin.product.add-pro',
			[
				'cats' => Category::all(),
				'colors' => Attribute::where('type','color')->get(),
				'sizes' => Attribute::where('type','size')->get(),
				'materials' => Attribute::where('type','material')->get(),
					
			]);
		}
		public function post_add(Request $req)
		{
			//dd($req->other_image);
			$this->validate($req,
			[
				'name' => 'required|unique:categorys,name',
				'category_id' =>'required',
				'slug' =>'required',
				'upload_file' => 'required|mimes:jpg,jpeg,png,gif',
				'price' =>'required',
				'sale_price' =>'required',
				'type' =>'required',
				'description' =>'required',
			],
			[
				'name.required' =>'Tên không được để trống!',
				'slug.required' =>'Slug không được để trống!',
				'category_id.required' =>'loại không được để trống!',
				'upload_file.required' =>'ảnh không được để trống!',
				'price.required' =>'Giá không được để trống!',
				'sale_price.required' =>'Giá km không được để trống!',
				'upload_file.required' =>'Ảnh không được để trống!',
				'name.unique' =>'Tên đã tồn tại!',
					
				'upload_file.mimes' => 'Chọn ảnh có đuôi jpg,jepg,...',
				'type.required' => 'loại không được để trống!',
				'description.required' => 'loại không được để trống!'

			]);
				// dd($req->all());
			$img='';
			if($req->hasFile('upload_file'))
			{
				$file=$req->upload_file;
				//$img=date('Y-m-d-h-s-i').$file->getClientOriginalName();
				$file->move(base_path('uploads/'),$file->getClientOriginalName());
				$img=$file->getClientOriginalName();			
			}
			
			$req->merge(['image' => $img]);



		if($pro=Product::create($req->all())){
			//ảnh
			$product_id=$pro->id;
			foreach ($req->other_image as $other)
			{
				$other->move(base_path('uploads/'),$other->getClientOriginalName());
				$other_name=$other->getClientOriginalName();
				ProImage::create([
					'links' => $other_name,
					'product_id' =>$product_id
				]);
			}

			// thêm thuộc tính
			//màu sắc
			foreach ($req->color as $cl) 
			{
				ProAttribute::create([
					'product_id' => $product_id,
					'attribute_id' => $cl
				]);
			}
			//kích thuơsc
			foreach ($req->size as $si) 
			{
				ProAttribute::create([
					'product_id' => $product_id,
					'attribute_id' => $si
				]);
			}
			//chất liệu
			foreach ($req->material as $ma)
			{
				ProAttribute::create([
					'product_id' => $product_id,
					'attribute_id' => $ma
				]);
			}

		}
		return redirect()->route('product')->with('success','Thêm '.' '.$pro->name.' '.'thành công!');		
		}

		// //xoa danh muc

		public function get_delete($id)
		{
			
			
			if(Product::destroy($id))
			{
				return redirect()->route('product')->with('success','Xóa sản phẩm thành công!');
			}else
			{
				return redirect()->back()->with('error','Thất bại. Vui lòng thử lại! ');
			}
		}

		//cap nhat danh muc
		public function get_update($id)
		{
			$sanpham=Product::find($id);
			//update thuoc tinh
			$atts=ProAttribute::where('product_id',$id)->get();
			$att_array=[];
			foreach ($atts as $att)
			{
				$att_array[]=$att->attribute_id;
			}
			
// dd($att_array);

			// $color_array=[];
			// $colors=Attribute::where('type','color')->get();
			// foreach ($colors as $cl) 
			// {
			// 	$color_array[] = $cl->id;
			// }
			// dd($color_array);
			return view('admin.product.update-pro',[
				'san_pham' => $sanpham,
				'cats' =>Category::all(),	
				'pros' => Product::where('id','<>',$id )->get(),
				'colors' => Attribute::where('type','color')->get(),
				'sizes' => Attribute::where('type','size')->get(),
				'materials' => Attribute::where('type','material')->get(),
				'att_array' => $att_array
			]);
		}
		public function post_update($id, Request $req)
		{			
			
			$this->validate($req,
			[
				'name' => 'required',
				'slug' =>'required',	
				//'upload_file' => 'required|mimes:jpg,jpeg,png,gif',
				'price' =>'required',
				'sale_price' =>'required',
				//'type' =>'required',
				'description' =>'required',
			],
			[
				'name.required' =>'Tên không được để trống!',
				'slug.required' =>'Slug không được để trống!',
				//'upload_file.required' =>'ảnh không được để trống!',
				//	'upload_file.mimes' => 'Chọn ảnh có đuôi jpg,jepg,...',
				'price.required' =>'Giá không được để trống!',
				'sale_price.required' =>'Giá km không được để trống!',		
				'description.required' => ':attribute không được để trống!',
			]);

			$sanpham=Product::find($id);
			$img=$sanpham->image;
			if($req->hasFile('upload_file'))
			{
				$file=$req->upload_file;
				//$img=date('Y-m-d-h-s-i').$file->getClientOriginalName();
				$file->move(base_path('uploads/'),$file->getClientOriginalName());
				$img=$file->getClientOriginalName();			
			}
			
			$req->merge(['image' => $img]);

			if($sanpham->update($req->all())){
				if($req->old_image)
				{
					foreach($req->old_image as $img_id =>$old)
					{
						$old->move(base_path('uploads/'),$old->getClientOriginalName());
						$old_name=$old->getClientOriginalName();
						
						ProImage::where('id',$img_id)->update([
							'links' => $old_name				
					]);
					}
				}

				//thêm ảnh 
				// foreach ($req->other_image as $other)
				// {
				// 	$other->move(base_path('uploads'),$other->getClientOriginalName());
				// 	$other_name=$other->getClientOriginalName();
				// 	ProImage::create([
				// 		'links' => $other_name,
				// 		'product_id' =>$id
				// 	]);
				// }

			}
		
			return redirect()->route('product')->with('success','Cập nhật sản phẩm thành công!');
		}

		public function del_img($id)
		{
			ProImage::find($id)->delete();
			return redirect()->back()->with('success','Xóa ảnh thành công!');

		}

	}
 ?>
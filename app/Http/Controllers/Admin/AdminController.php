<?php 
	namespace App\Http\Controllers\Admin;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\User;
	use Auth;
	use View;
	class AdminController extends Controller
	{
		
		public function get_admin()
		{
			return view('admin.admin');
		}

		public function get_register()
		{
			 return view('admin.register');
		}

		public function post_register(Request $req)
		{	
			$this->validate($req,
			[
				'name' => 'required|min:6|max:150',
				'email' => 'required|email|unique:users,email',
				'password' => 'required|min:6|max:150',
				'comfirm_password' => 'required|same:password'
			],
			[
				'name.required' => 'Họ và tên không được để trống!',
				'name.min' => 'Họ và tên ít nhất 6 ký tự!',
				'name.max' => 'Họ và tên nhiều nhất 150 ký tự!',
				'email.required' => 'Email không được để trống!',
				'email.email' => 'Email không đúng định dạng!',
				'email.unique' => 'Email đã tồn tại!',
				'password.required' => 'Mật khẩu không được để trống!',
				'password.min' => 'Mật khẩu ít nhất 6 ký tự!',
				'password.max' => 'Mật khẩu nhiều nhất 150 ký tự!',
				'cofirm_password.required' => 'Mật khẩu nhập lại không được để trống!',
				'comfirm_password.same' => 'Mật khẩu chưa trùng khớp!'

			]);

			//dd($req->all());
				$pass=bcrypt($req->password);
				$req->offsetUnset('password');
				$req->merge(['password' => $pass]);

			//phân quyền
				$req->offsetUnset('level');
				$req->merge(['level' => 'admin']);

			if(User::create($req->all()))
			{
				return redirect()->route('login')->with('success','Tạo mới tài khoản thành công!');
			}else
			{
				return redirect()->back()->with('error','Thất bại!Vui lòng thử lại!');
			}
			
		}

	

		public function get_login()
		{
			
			return view('admin.login');
		}
		
		public function post_login(Request $req)
		{
			$this->validate($req,
			[
	    		'email' => 'required|email',
	    		'password' => 'required'
	    	],
	    	[
	    		'required' => 'The :attribute không được trống',
	    		'email' => 'The :attribute chưa đúng định dạng'
	    	]);

			if(Auth::guard('admin')->attempt($req->only('email','password'),$req->has('remember')))
			{
				 return redirect()->route('admin')->with('success','Đăng nhập thành công!');

			}else{
					return redirect()->back()->with('error','Lỗi! Vui lòng đăng nhập lại!!');
			}

		}

		public function get_logout()
		{
			Auth::guard('admin')->logout();
			return redirect()->route('login')->with('success','Đăng xuất thành công!');
			

		}

	}
 ?>
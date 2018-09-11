<?php 
	namespace App\Http\Controllers\Home;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\User;
	use Auth;
	class AuthController extends Controller
	{
		
		public function get_dangky()
		{
			 return view('auth.register');
		}

		public function post_dangky(Request $req)
		{	$this->validate($req,
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

				$pass=bcrypt($req->password);
				$req->offsetUnset('password');
				$req->merge(['password' => $pass]);

			if(User::create($req->all()))
			{
				return redirect()->route('dangnhap')->with('success','Tạo mới tài khoản thành công!');
			}else
			{
				return redirect()->back()->with('error','Thất bại!Vui lòng thử lại!');
			}
			
		}

		public function get_dangnhap()
		{
			return view('auth.login');
		}

			
		public function post_dangnhap(Request $req)
		{
			$this->validate($req,
			[
				
				'email' => 'required|email',
				'password' => 'required',
			],
			[
				'email.required' => 'Email không được để trống!',
				'email.email' => 'Email không đúng định dạng!',
				'password.required' => 'Mật khẩu không được để trống!',
				
			]);
			
			if(Auth::attempt($req->only('email','password'),$req->has('remember')))
				
			{
				 if (Auth::user()->level =='customer')
				  { 
		            return redirect()->route('home')->with('success','Đăng nhập thành công!');
		      	  }
				
			}else
			{
				return redirect()->back()->with('error','Thất bại! Vui lòng thử lại!');
			}
		}

		public function get_dangxuat()
		{
			Auth::logout();
			return redirect()->route('home');
		}

		
		public function get_change()
		{
			return view('auth.change-pass');
		}
		public function post_change(Request $req)
		{
			$this->validate($req,
			[
				'old_password' => 'required|OldPassword',
				'password' => 'required|min:6|max:150|unique:users,password',		
				'comfirm_password' => 'required|same:password'
			],
			[
			
				'old_password.required' => 'Mật khẩu không được để trống!',
				'old_password' => ':attribute không trùng khớp!',
				'unique' => ':attribute là mật khẩu cũ!',
				'password.required' => 'Mật khẩu không được để trống!',
				'password.min' => 'Mật khẩu ít nhất 6 ký tự!',
				'password.max' => 'Mật khẩu nhiều nhất 150 ký tự!',
				'cofirm_password.required' => 'Mật khẩu nhập lại không được để trống!',
				'comfirm_password.same' => 'Mật khẩu chưa trùng khớp!'

			]);

			// dd($req->all());

			Auth::user()->update([
				'password' => bcrypt($req->password)
			]);

			return redirect()->route('home');
		}
	}
?>
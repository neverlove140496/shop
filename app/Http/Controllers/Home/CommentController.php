<?php 
	namespace App\Http\Controllers\Home;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Comment;
	use App\Models\Blog;
	use Auth;

	class CommentController extends Controller
	{
	
		public function post_comment($id, Request $req)
		{	
			$comment = new Comment;
			 $comment->user_id = Auth::user()->id;
			 $comment->blog_id = $id;
			 $comment->content = $request->input('comment');
			 $comment->save();
			dd($req->all());
			 return redirect("/blog-detail/{$id}")->with('success','Thêm bình luận thành công!');

			// if(Comment::find($id)->update($req->all()))
			// {
			// 	return redirect()->route('comment')->with('success','Thêm bình luận thành công!');
			// }else
			// {
			// 	return redirect()->back()->with('error','Thất bại. Vui lòng thử lại! ');
			// }
			
			
		}

		
	}
?>
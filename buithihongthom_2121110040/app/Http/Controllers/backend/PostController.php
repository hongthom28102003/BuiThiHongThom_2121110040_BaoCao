<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('status','!=',0)->orderBy('created_at','desc')->get();
        return view('backend.post.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topic = Topic::where('status',1)->get();
        return view('backend.post.create',compact('topic'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title, '-');
        $post->topic_id = $request->input('topic_id');
        $post->detail = $request->input('detail');
        $post->metakey = $request->input('metakey');
        $post->metadesc = $request->input('metadesc');
        $post->type = 'post';
        $post->created_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filename = $post->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $filename);
            $post->image = $filename;
        } 
        $post->save();
        return redirect()->route('post.index')->with('success', 'Thêm bài viết thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('backend.post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $topic = Topic::where('status',1)->get();

        return view('backend.post.edit',compact('topic','post'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->slug = Str::slug($post->title, '-');
        $post->topic_id = $request->input('topic_id');
        $post->detail = $request->input('detail');
        $post->metakey = $request->input('metakey');
        $post->metadesc = $request->input('metadesc');
        $post->type = 'post';
        $post->created_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filePath = public_path('images/posts/' . $post->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $post->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/posts'), $filename);
            $post->image = $filename;
        } 
        $post->save();
        return redirect()->route('post.index')->with('success', 'Cập nhật bài viết thất bại');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $post = Post::find($id);
        if($post == NULL)
        {
            return redirect()->route('post.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       $post->delete();
       return redirect()->route('post.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    }
    
    public function trash()
    {
        $post = Post::where('status',0)->get();
        return view('backend.post.trash', compact ('post')) ;
    }
    public function delete($id)
    {
        $post = Post::find($id);
        if($post == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $post ->updated_by = 1;//đăng nhập
       $post ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $post ->status =0;
       $post->save();
       return redirect()->route('post.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $post = Post::find($id);
    //     $post->status = 0;
    //     $post->save();
    //     return redirect()->route('post.index');    
    // }
   
    public function restore($id)
    {
        $post = Post::find($id);
        if($post==null){
            return redirect()->route('post.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $post->status=2;
        $post->updated_by=1;
        $post->updated_at==date('Y-m-d H:i:s');
        $post->save();
        return redirect()->route('post.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $row = Post::find($id);
        if($row == NULL)
        {
            return redirect()->route('post.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('post.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }

}

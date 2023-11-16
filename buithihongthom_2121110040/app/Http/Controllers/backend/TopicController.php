<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Database\Seeders\TopicSeeder;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.topic.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::where('status', 1)->get();

        return view('backend.topic.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = new Topic();
        $topic->name = $request->input('name');
        $topic->slug = Str::slug($topic->name, '-');
        $topic->parent_id = $request->input('parent_id');
        $topic->metakey = $request->input('metakey');
        $topic->metadesc = $request->input('metadesc');
        $topic->created_by = 1;
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('success', 'Thêm Thương hiệu thành công');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $topic = Topic::find($id);
        return view('backend.topic.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topic = Topic::find($id);
        $topics = Topic::where('status', '=', '1')->get();

        return view('backend.topic.edit', compact('topics', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->input('name');
        $topic->slug = Str::slug($topic->name, '-');
        $topic->parent_id = $request->input('parent_id');
        $topic->metakey = $request->input('metakey');
        $topic->metadesc = $request->input('metadesc');
        $topic->created_by = 1;
        $topic->updated_by = 1;
        $topic->save();
        return redirect()->route('topic.index')->with('success', 'Cập nhật thương hiệu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $topic = Topic::find($id);
        if ($topic == NULL) {
            return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->delete();

        return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'xóa khỏi CSDL thành công!']);
    }
    // {
    //     $topic = Topic::find($id);
    //     $topic->delete();
    //     $topic->save();
    //     return redirect()->route('topic.index');
    // }    
    public function trash()
    {
        $topic = Topic::where('status', 0)->get();
        return view('backend.topic.trash', compact('topic'));
    }

    public function delete($id)
    {
        $topic = Topic::find($id);
        if ($topic == NULL) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->updated_by = 1; //đăng nhập
        $topic->updated_at = date('Y-m-d H:i:s'); //ngày tạoo
        $topic->status = 0;
        $topic->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $topic = Topic::find($id);
    //     $topic->status = 0;
    //     $topic->save();
    //     return redirect()->route('topic.index');    
    // }

    public function restore($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('topic.index')->with('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $topic->status = 2;
        $topic->updated_by = 1;
        $topic->updated_at == date('Y-m-d H:i:s');
        $topic->save();
        return redirect()->route('topic.trash')->with('message', ['type' => 'danger', 'msg' => 'Khôi phục thành công']);
    }

    public function status($id)
    {
        $row = Topic::find($id);
        if ($row == NULL) {
            return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }

        $row->status = ($row->status == 1) ? 2 : 1; // trạng thái chưa xuất mã
        $row->save();
        return redirect()->route('topic.index')->with('message', ['type' => 'danger', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}

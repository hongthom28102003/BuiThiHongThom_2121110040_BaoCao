<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status','!=',0)->get();
        return view('backend.category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status','=',1)->get(); 
        return view('backend.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name, '-');
        $category->sort_order = $request->input('sort_order');
        $category->parent_id = $request->input('parent_id');
        $category->metakey = $request->input('metakey');
        $category->metadesc = $request->input('metadesc');
        $category->created_by = 1;
        $category->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $category->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/category'), $filename);
            $category->image = $filename;
        } 
        if($category->save()){
            $link = new Link();
            $link->slug = $category->slug;
            $link->table_id = $category->id;
            $link->type = 'category';
            $link->save();
            return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công');
        }
        return redirect()->route('category.index')->with('success', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = category::find($id);
        $categorys = category::where('status','=','1')->get();
        $html='';
        foreach($categorys as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.category.edit',compact('html','category'));    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($category->name, '-');
        $category->sort_order = $request->input('sort_order');
        $category->parent_id = $request->input('parent_id');
        $category->metakey = $request->input('metakey');
        $category->metadesc = $request->input('metadesc');
        $category->created_by = 1;
        $category->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filePath = public_path('images/categorys/' . $category->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $category->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/categorys'), $filename);
            $category->image = $filename;
        } else if (!empty($imageurl)) {
            $category->image = $request->input('urlimage');
        } 
        $category->save();
        if($category->save()){
            $link = Link::where('table_id',$id)->first();
            $link->slug = $category->slug;
            $link->save();
            return redirect()->route('category.index')->with('success', 'Cập nhập danh mục thành công');
        }
        return redirect()->route('category.index')->with('success', 'Cập nhập danh mục thất bại');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $category = Category::find($id);
        if($category == NULL)
        {
            return redirect()->route('category.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       if($category->delete())
       {
            // có 2 điều kiện xóa: 
            $link = Link::where([['type','=',1],['table_id','=', $id]])->first();
            $link ->delete();
            print_r($link);
       }
       return redirect()->route('category.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);

    }
    public function trash()
    {
        $category = Category::where('status',0)->get();
        return view('backend.category.trash', compact ('category')) ;
    }
    public function delete($id)
    {
        $category = Category::find($id);
        if($category == NULL)
        {
            return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $category ->updated_by = 1;//đăng nhập
       $category ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $category ->status =0;
       $category->save();
       return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $category = category::find($id);
    //     $category->status = 0;
    //     $category->save();
    //     return redirect()->route('category.index');    
    // }
   
    public function restore($id)
    {
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('category.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $category->status=2;
        $category->updated_by=1;
        $category->updated_at==date('Y-m-d H:i:s');
        $category->save();
        return redirect()->route('category.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $category = Category::find($id);
        if($category == NULL)
        {
            return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $category ->updated_by = 1;//đăng nhập
       $category ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $category ->status =($category->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $category->save();
       return redirect()->route('category.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }

}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Link;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand =  Brand::where('status','!=',0)->get();
        return view('backend.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brand = Brand::where('status','=',1)->get();
        return view('backend.brand.create',compact('brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->input('name');
        $brand->slug = Str::slug($brand->name, '-');
        $brand->sort_order = $request->input('sort_order');
        $brand->metakey = $request->input('metakey');
        $brand->metadesc = $request->input('metadesc');
        $brand->created_by = 1;
        $brand->updated_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $brand->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brand'), $filename);
            $brand->image = $filename;
        }
        if($brand->save()){
            $link = new Link();
            $link->slug = $brand->slug;
            $link->table_id = $brand->id;
            $link->type = 'brand';
            $link->save();
            return redirect()->route('brand.index')->with('success', 'Thêm Thương hiệu thành công');
        }
        return redirect()->route('brand.index')->with('success', 'Thêm Thương hiệu thất bại');
            
    }
   

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        $brands = Brand::where('status','=','2')->get();
        $html='';
        foreach($brands as $item){
            $html.='<option value="'.$item->id+1 .'">Sau: '.$item->name.'</option>';
        }
        return view('backend.brand.edit',compact('html','brand'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brand = Brand::find($id);
        $brand->name = $request->input('name');
        $slug = $brand->slug = Str::slug($brand->name, '-');
        $brand->sort_order = $request->input('sort_order');
        $brand->metakey = $request->input('metakey');
        $brand->metadesc = $request->input('metades');
        $brand->created_by = 1;
        $brand->updated_by = 1;
        $image = $request->file('image');
        $imageurl = $request->input('urlimage');
        if (isset($image)) {
            $filePath = public_path('images/brand/' . $brand->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = $brand->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brand'), $filename);
            $brand->image = $filename;
        }
        if($brand->save()){
            $link = Link::where('table_id',$id)->first();
            $link->slug = $slug;
            $link->save();
            return redirect()->route('brand.index')->with('success', 'Cập nhập hiệu thành công');
        }
        return redirect()->route('brand.index')->with('success', 'Cập nhập Thương hiệu thành công');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $brand = Brand::find($id);
        if($brand == NULL)
        {
            return redirect()->route('brand.trash')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
        }
       if($brand->delete())
       {
            // có 2 điều kiện xóa: 
            $link = Link::where([['type','=',1],['table_id','=', $id]])->first();
            $link ->delete();
            print_r($link);
       }
       return redirect()->route('brand.trash')->with('message',['type' => 'danger','msg' =>'xóa khỏi CSDL thành công!']);
    }
    // {
    //     $brand = Brand::find($id);
    //     $brand->delete();
    //     $brand->save();
    //     return redirect()->route('brand.index');
    // }    
    public function trash()
    {
        $brand = Brand::where('status',0)->get();
        return view('backend.brand.trash', compact ('brand')) ;
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        if($brand == NULL)
        {
            return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       $brand ->updated_by = 1;//đăng nhập
       $brand ->updated_at =date('Y-m-d H:i:s'); //ngày tạoo
       $brand ->status =0;
       $brand->save();
       return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $brand = Brand::find($id);
    //     $brand->status = 0;
    //     $brand->save();
    //     return redirect()->route('brand.index');    
    // }
   
    public function restore($id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            return redirect()->route('brand.index')->with('message',['type' => 'success','msg' =>'Mẫu tin không tồn tại']);
        }
        $brand->status=2;
        $brand->updated_by=1;
        $brand->updated_at==date('Y-m-d H:i:s');
        $brand->save();
        return redirect()->route('brand.trash')->with('message',['type' => 'danger','msg' =>'Khôi phục thành công']);  
    }

    public function status($id)
    {
        $row = Brand::find($id);
        if($row == NULL)
        {
            return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Mẫu tin không tồn tại']);
       }
       
       $row ->status =($row->status==1) ? 2 :1;// trạng thái chưa xuất mã
       $row->save();
       return redirect()->route('brand.index')->with('message',['type' => 'danger','msg' =>'Thay đổi trạng thái thành công!']);
    }
}
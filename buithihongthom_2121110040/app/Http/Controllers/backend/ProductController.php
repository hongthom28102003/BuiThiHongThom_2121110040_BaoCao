<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where('status', '!=', 0)->get();
        return view('backend.product.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $categorys = Category::where('status', 1)->get();
        return view('backend.product.create', compact('brands', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->qty = $request->input('qty');
        $product->detail = $request->input('detail');
        $product->metakey = $request->input('metakey');
        $product->metadesc = $request->input('metadesc');
        $product->created_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filename = $product->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $brands = Brand::where('status', 1)->get();
        $categorys = Category::where('status', 1)->get();
        return view('backend.product.edit', compact('brands','categorys', 'product'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->slug = Str::slug($product->name, '-');
        $product->category_id = $request->input('category');
        $product->brand_id = $request->input('brand');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->qty = $request->input('qty');
        $product->detail = $request->input('detail');
        $product->metakey = $request->input('metakey');
        $product->metadesc = $request->input('metadesc');
        $product->created_by = 1;
        $image = $request->file('image');
        if (isset($image)) {
            $filePath = public_path('images/product/' . $product->name);
            if (file_exists($filePath)) {
                unlink($filePath);
                $image->delete();
            }
            $filename = $product->slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/product'), $filename);
            $product->image = $filename;
        }
        $product->save();
        return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Call to a member function delete() on null:: khai báo delete là ok

        $product = Product::find($id);
        if ($product == NULL) {
            return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->delete();

        return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'xóa khỏi CSDL thành công!']);
    }
    // {
    //     $product = Product::find($id);
    //     $product->delete();
    //     $product->save();
    //     return redirect()->route('product.index');
    // }    
    public function trash()
    {
        $product = Product::where('status', 0)->get();
        return view('backend.product.trash', compact('product'));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if ($product == NULL) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->updated_by = 1; //đăng nhập
        $product->updated_at = date('Y-m-d H:i:s'); //ngày tạoo
        $product->status = 0;
        $product->save();
        return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Xóa mẫu tin vào thùng rác thành công!']);
    }
    // {
    //     $product = Product::find($id);
    //     $product->status = 0;
    //     $product->save();
    //     return redirect()->route('product.index');    
    // }

    public function restore($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('product.index')->with('message', ['type' => 'success', 'msg' => 'Mẫu tin không tồn tại']);
        }
        $product->status = 2;
        $product->updated_by = 1;
        $product->updated_at == date('Y-m-d H:i:s');
        $product->save();
        return redirect()->route('product.trash')->with('message', ['type' => 'danger', 'msg' => 'Khôi phục thành công']);
    }

    public function status($id)
    {
        $row = Product::find($id);
        if ($row == NULL) {
            return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại']);
        }

        $row->status = ($row->status == 1) ? 2 : 1; // trạng thái chưa xuất mã
        $row->save();
        return redirect()->route('product.index')->with('message', ['type' => 'danger', 'msg' => 'Thay đổi trạng thái thành công!']);
    }
}

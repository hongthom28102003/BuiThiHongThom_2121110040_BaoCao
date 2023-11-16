<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class TimkiemController extends Controller
{
    // public function index($search){

    //     $product = Product::where([['status',1],[]])
    //     return view('frontend.Search');
    // }
    public function search(Request $request)
    {
        $search = $request->input('search');
        $list_product = Product::where('name', 'like', '%' . $search . '%')->get();

        return view('frontend.Search', compact('list_product','search'));
    }
}

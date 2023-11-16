@extends('layout.site')

@section('content')

<div class="container" style="margin-top: 150px">
    <h1 class="text-center fw-bold my-4 fs-4 text-danger">TẤT CẢ SẢN PHẨM</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        
    @foreach ($list_product as $productitem)
        <x-product-item  :productitem="$productitem"/>
    @endforeach
    </div>
    
</div>
@endsection
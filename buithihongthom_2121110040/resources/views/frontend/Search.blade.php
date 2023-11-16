@extends('layout.site')

@section('content')
    <div class="my-10 ">
        <div class='mt-10' style="width: 100%;height: 300px;position: relative;">
            <img class="" style="width: 100%;height: 100%;"
                src="https://images.freecreatives.com/wp-content/uploads/2016/04/Solid-Black-Website-Background.jpg"
                alt="">
            <div class="text-white fs-1" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%) ">
                Tìm kiếm: <span class="text-danger">{{ $search }}</span>
            </div>
        </div>
    </div>
    @if (count($list_product) > 0)
        <div class="row row-cols-1 row-cols-md-5 g-4">

            @foreach ($list_product as $productitem)
                <x-product-item :productitem="$productitem" />
            @endforeach


        </div>
    @else
        <h1 class="py-10 text-center">sản phẩm không tồn tại</h1>
    @endif
@endsection

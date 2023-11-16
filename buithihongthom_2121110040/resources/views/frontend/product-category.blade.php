@extends('layout.site')

@section('content')
<div class="container" style="margin-top: 150px">
    <h3 class="text-center my-4">{{ $categoryName }}</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach ($list_product as $productitem)
            <x-product-item :productitem="$productitem" />
        @endforeach
    </div>
</div>
    
@endsection

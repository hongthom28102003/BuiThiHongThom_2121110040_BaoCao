@if (count($list_product))
    <div class="container mt-5">
        <span class="d-block text-center text-warning font2">Trang Sức Dứa</span>
        <h3 class="fs-1 text-center font2 text-capitalize">{{ $category->name }}</h3>
        <p class="text-center font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
            Hãy đến với chúng tôi để có những món quà phù hợp và ý nghĩa nhất.
        </p>
    </div>
    <div class="container mt-5">
        <div class="row">
            {{-- <div class="col-3 bg-item">
                <img class="w-100"
                    src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_banner_image_1.jpg?1663905788816"
                    alt="">
                <img class="w-100"
                    src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_banner_image_2.jpg?1663905788816"
                    alt="">
            </div> --}}
            <div class="col-12">
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($list_product as $productitem)
                        <x-product-item :productitem="$productitem" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

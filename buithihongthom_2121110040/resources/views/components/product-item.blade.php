<style>
    a{
        text-decoration: none;

    }
</style>
<div class="col">
    <div class="card border-0">
        <div class="card-img">
            <a href="{{ $product->slug }}">
                <img src="{{ asset('images/product/'.$product->image) }}"
                class="card-img-top" alt="...">
                {{-- <img src="{{ asset('images/product/' . $product->image) }}" alt="..."/> --}}
            </a>
            
        </div>
        <div class="card-body sanpham">
            <a href="{{ $product->link }}" class="text-dark">
            <h5 class="card-title text-center ">{{ $product->name }}</h5>
            </a>
            <div class="row">
                <div class="col">
                    <h6 class="text-warning ">{{ $product->price }}₫ </h6>
                </div>
                <div class="col">
                    <h6 class="text-secondary fs-6"><del>{{ $product->price_sale }}₫</del> </h6>
                </div>
            </div>

        </div>
    </div>
</div>

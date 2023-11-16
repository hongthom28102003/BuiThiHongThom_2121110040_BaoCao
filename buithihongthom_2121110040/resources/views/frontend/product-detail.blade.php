@extends('layout.site')

@section('content')

    <div style="margin-top: 200px" class="container mt-5">
        <div class="row" style="margin-top: 150px">
            <div class="col-md-5">
                <div class="product-image">
                    <img height="500px" src="{{ asset('images/product/' . $pro->image) }}" alt="">
                </div>
            </div>
            
            <div class="col-md-6">
                <h1>{{ $pro->name }}</h1>
                <p>trang suc dep</p>
                <div class="row d-flex">

                    <div aria-haspopup="true" aria-expanded="false" id="miniVoucherPopoverLabel"
                        class="rY0UiC _3w+Zzx Mhu9Ud d-flex" tabindex="0" style="position: relative;">
                        <section class="mini-vouchers dvOk1c d-flex">
                            <h5 class="mini-vouchers__label">
                                Mã giảm giá của Shop
                            </h5>
                            <div class="mini-vouchers__wrapper flex flex-auto flex-no-overflow ms-5">
                                <div class="mini-vouchers__vouchers flex flex-auto flex-no-overflow" style="display: flex;gap: 10px;">
                                    <div
                                        class="voucher-ticket voucher-ticket--VN voucher-ticket--seller-mini-solid mini-voucher-with-popover">
                                        <div class="">
                                            <span class="voucher-promo-value voucher-promo-value--percent">
                                                5
                                            </span>
                                            <span class="voucher-promo-label">
                                                %
                                            </span>
                                            <span class="voucher-promo-label voucher-promo-label--off">
                                                GIẢM
                                            </span>
                                        </div>
                                    </div>
                                    <div
                                        class="voucher-ticket voucher-ticket--VN voucher-ticket--seller-mini-solid mini-voucher-with-popover">
                                        <div class="">
                                            <span class="voucher-promo-value voucher-promo-value--percent">
                                                10
                                            </span>
                                            <span class="voucher-promo-label">
                                                %
                                            </span>
                                            <span class="voucher-promo-label voucher-promo-label--off">
                                                GIẢM
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mini-vouchers__mask">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    
                    {{-- <div class="ty-product-block__sku mb-2">
                        <div class="ty-control-group ty-sku-item cm-hidden-wrapper" id="mp_sku_update_73106">
                            <input type="hidden" name="appearance[show_sku]" value="1">
                            <span class="ty-control-group__item cm-reload-73106" id="mp_product_code_73106">Mã:
                                <span class="product_code_w">
                                    GMXMXMW002466
                                </span><!--mp_product_code_73106-->
                            </span>
                        </div>
                    </div> --}}

                    <div class="jewelry-size-selector mb-2">
                        <p class="size-label m-0">Kích thước đường kính (mm):</p>
                        <div class="size-options d-flex" style="gap: 10px" id="jewelry_size_options">
                            <div class="size-option">
                                <input type="radio" id="size_option_1" class="size-radio" name="jewelry_size"
                                    value="140348">
                                <label for="size_option_1" class="size-label-text">50 mm</label>

                            </div>
                            <div class="size-option">
                                <input type="radio" id="size_option_2" class="size-radio" name="jewelry_size"
                                    value="140350">
                                <label for="size_option_2" class="size-label-text">51 mm</label>

                            </div>
                            <div class="size-option">
                                <input type="radio" id="size_option_3" class="size-radio" name="jewelry_size"
                                    value="140351">
                                <label for="size_option_3" class="size-label-text">52 mm</label>

                            </div>
                            <div class="size-option">
                                <input type="radio" id="size_option_4" class="size-radio" name="jewelry_size"
                                    value="140352">
                                <label for="size_option_4" class="size-label-text">53 mm</label>
                            </div>
                            <div class="size-option">
                                <input type="radio" id="size_option_5" class="size-radio" name="jewelry_size"
                                    value="140354">
                                <label for="size_option_5" class="size-label-text">54 mm</label>

                            </div>
                            <div class="size-option">
                                <input type="radio" id="size_option_6" class="size-radio" name="jewelry_size"
                                    value="140355">
                                <label for="size_option_6" class="size-label-text">55 mm</label>

                            </div>
                        </div>
                    </div>

                    <div class="col-6">Giá bán:
                        <h3 class="text-danger"> {{  number_format("$pro->price");}}</h3>
                    </div>
                    <div class="col-6">Giá khuyễn mại:
                        <h3 class="text-danger"> {{ number_format("$pro->price_sale") }}</h3>
                    </div>
                </div>
                <button class="btn btn-danger py-3 px-5">
                    <img height="25px" class="mr-1" src={{ asset('images/img/giohang.gif') }} alt="">
                    Thêm vô giỏ hàng
                </button>
                <button class="btn btn-danger py-3 px-5">
                    Mua ngay
                </button>
                <div style="margin-top: 30px; border-top: 1px solid rgba(0, 0, 0, 0.05);">
                    <div class="_7VxwfV">
                        <a target="_blank" rel="noopener noreferrer"
                            href="https://www.facebook.com/profile.php?id=100064438742484" class="MHwGxF">
                            <img height="50px" width="50px" src={{ asset('images/logo.jpg') }} class="_5eVamu">
                            <span class="A8IoOY">
                                Shope Đảm Bảo
                            </span>
                            <span class="tfq-gZ">
                                3 Ngày Trả
                                Hàng / Hoàn Tiền
                            </span>
                        </a>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
@endsection

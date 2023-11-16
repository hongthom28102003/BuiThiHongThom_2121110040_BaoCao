@extends('layout.site')
@section('content')
    <div style="margin-top: 148px   ">
        <x-main-slider />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row ">
            <div class="col-6">
                <img src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_about.jpg?1663905788816"
                    alt="">
            </div>

            <div class="col-6 text-center mt-5">
                {{-- <span class="d-block mt-5 text-warning">Mỹ phẩm</span> --}}
                <h3 class="fs-1 font2">Trang sức Dứa</h3>
                {{-- <span class="d-block">TRANG SỨC</span> --}}
                <p class="text-center font2 " style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">Mỗi một người phụ nữ đều mang trong mình nét đẹp riêng & xứng đáng được ngưỡng mộ, được tôn vinh và được tự tin với chính con người mình. Phụ nữ luôn xứng đáng với những điều trọn vẹn nhất cho cuộc sống của mình: Hạnh phúc trọn vẹn, vẻ đẹp trọn vẹn và còn nhiều hơn thế.  Dứa hơn cả một thương hiệu trang sức, mà còn là đại diện cho một phong cách sống của những giá trị hoàn mỹ xứng đáng nhất dành cho phụ nữ.
                    "TRANG SỨC DỨA – CHO PHỤ NỮ LUÔN TRỌN VẸN"</p>
                <button class="mt-3 font2">
                    CỬA HÀNG
                </button>
                <button class="mt-3 font2">
                    XEM THÊM
                </button>
            </div>
        </div>
    </div>

    @foreach ($list_category as $cat)
        <x-product-home :cat='$cat' />
    @endforeach

    <div class="container mt-5">
        <div class="row">
            <div class="col img-item p-0 me-3">
                <a href="#"><img class="w-100"
                        src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_collections_image_1.jpg?1663905788816"
                        alt=""></a>
                <span>VÒNG TAY</span>

            </div>
            <div class="col img-item p-0 me-3">
                <a href="#">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_collections_image_2.jpg?1663905788816"
                        alt="">
                </a>
                <span>NHẪN</span>

            </div>
            <div class="col img-item p-0 me-3">
                <a href="#"><img class="w-100"
                        src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_collections_image_3.jpg?1663905788816"
                        alt=""></a>
                <span>DÂY CHUYỀN</span>

            </div>
            <div class="col img-item p-0">
                <a href="#"><img class="w-100"
                        src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/evo_feature_collections_image_4.jpg?1663905788816"
                        alt=""></a>
                <span>KHUYÊN TAI</span>

            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="title">
            <span class="d-block text-center text-warning font2">Thế giới phụ kiện</span>
            <h2 class="text-center font2">Sản phẩm ưa chuộng</h2>
            <p class="text-center font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">Chọn nhẫn cầu hôn và nhẫn
                đính hôn kim cương, vàng, đá CZ đẹp và sang trọng với 
                Trang Sức Dứa</p>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
                <div class="card border-0">
                    <div class="card-img">
                        <img src="https://tse2.mm.bing.net/th?id=OIP.klNL9D0D85sEfhk-tTcRLgAAAA&pid=Api&P=0"
                            class="card-img-top" alt="...">
                    </div>

                    <div class="card-body sanpham">
                        <h5 class="card-title text-center ">Nhẫn DR kim cương</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-warning ">5.000.000₫ </h6>
                            </div>
                            <div class="col">
                                <h6 class="text-secondary fs-6"><del>-6.500.000₫</del> </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <div class="card-img">
                        <img src="https://tse4.mm.bing.net/th?id=OIP.PKIsirpf3wlGq6tnsegS6AHaHa&pid=Api&P=0"
                            class="card-img-top" alt="...">
                    </div>

                    <div class="card-body sanpham">
                        <h5 class="card-title text-center ">Nhẫn DR cao cấp</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-warning ">4.042.000₫ </h6>
                            </div>
                            <div class="col">
                                <h6 class="text-secondary fs-6"><del>-5.032.000₫</del> </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <div class="card-img">
                        <img src="https://bizweb.dktcdn.net/thumb/large/100/368/327/products/the-adventure-begins-framed-poster.jpg?v=1571794701413"
                            class="card-img-top" alt="...">
                    </div>

                    <div class="card-body sanpham">
                        <h5 class="card-title text-center ">Nhẫn Đá quý tự nhiên Citrine 6mm flower</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-warning ">1.592.000₫ </h6>
                            </div>
                            <div class="col">
                                <h6 class="text-secondary fs-6"><del>-2.592.000₫</del> </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0">
                    <div class="card-img">
                        <img src="https://bizweb.dktcdn.net/thumb/large/100/368/327/products/db09.jpg?v=1571800154427"
                            class="card-img-top" alt="...">
                    </div>

                    <div class="card-body sanpham">
                        <h5 class="card-title text-center ">Nhẫn Đá quý tự nhiên Citrine 6mm flower</h5>
                        <div class="row">
                            <div class="col">
                                <h6 class="text-warning ">1.042.000₫ </h6>
                            </div>
                            <div class="col">
                                <h6 class="text-secondary fs-6"><del>-2.042.000₫</del> </h6>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mt-5">
        <div class="title">
            <span class="d-block text-center text-warning font2">Tạp chí</span>
            <h2 class="text-center font2">Tin tức nổi bật</h2>
            <p class="text-center font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                Luôn cập nhật xu thế thời trang mới nhất để đáp ứng nhu cầu khách hàng.
            </p>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/368/327/articles/trangochangmixdotretrungvoiaokhoacbomber.jpg?v=1571063029633"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Mùa se lạnh đã về đến nơi rồi, không bắt ngay 2 trend Thu Đông này thì chờ đến bao giờ?
                        </h5>
                        <p class="card-text font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Tone màu ấm áp, họa tiết lấy cảm hứng hoàng gia xa hoa… và những item nào sẽ chinh phục tín đồ
                            thời trang năm nay? Hãy xem ngay để cập nhật cho mùa thu đông đang tới nhé!
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/368/327/articles/v2.jpg?v=1571062937777"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Tiết trời mát mẻ, bạn áp dụng 4 cách diện váy sau thì xinh xắn và tỏa sáng hơn cả nắng thu
                        </h5>
                        <p class="card-text font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Váy vóc thì mùa nào cũng có thể mặc để hoàn thiện vẻ ngoài xinh xẻo, nữ tính.
                            Có điều, ở mỗi khoảng thời gian khác nhau trong năm, bạn cần biết cách biến tấu để vừa hợp thời
                            tiết, vừa hợp xu hướng.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <img src="https://bizweb.dktcdn.net/thumb/large/100/368/327/articles/5d3-9134-14996526027-7896.jpg?v=1571062885203"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Sam chăm biến hóa style thế này, bảo sao dân tình ngắm hoài
                            không chán
                        </h5>
                        <p class="card-text font2" style="color:rgba(39, 38, 38, 0.763);font-size: 13px;">
                            Mỗi khi xuất hiện, Sam lại gây ấn tượng với nhan sắc trẻ trung, long lanh
                            không góc chết khiến gái đôi mươi cũng phải ghen tị. Cô nàng U30 này còn rất chăm biến đổi style
                            để làm mới hình ảnh.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

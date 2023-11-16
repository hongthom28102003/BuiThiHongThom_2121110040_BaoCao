<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CHỦ</title>
    <link rel="stylesheet" href="{{ @asset('css/main.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .bg {
        /* font-family: 'Comforter', cursive !important; */
        font-family: 'Mooli', sans-serif;
        background: rgba(255, 255, 255, 1);
        position: fixed;
        top: 0;
        /* width: 100%; */
        left: 0;
        right: 0;
        padding: 10px;
        z-index: 9999;
        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .bg ul li .nav1::after {
        content: '';
        display: block;
        height: 3px;
        background: red;
        transition: .3s;
        width: 0%;
        /* position: absolute; */
        bottom: 0;
    }

    .bg ul li:hover .nav1::after {
        width: 100%;
    }

    .bg ul li:hover .nav1 {
        color: red;
    }

    ul {
        list-style: none;
        margin: 0;
    }

    .search:hover .search-content {
        display: block
    }

    .search-content {
        display: none
    }
</style>

<body>
    <header>
        <div class="container">
            <div class="row bg px-5">
                <div class="col-2 mt-3">
                    <img width="70px" class="" src="{{ asset('images/logo.jpg') }}" alt="">
                </div>
                <div class="col-7  mt-4 ms-5">
                    <ul class="d-flex ms-5">
                        <x-main-menu />
                    </ul>
                </div>
                <div class="col mt-3">
                    <ul class=" d-flex">
                        <li style="justify-content: space-around;flex-direction: column;align-items: center"
                            class="d-flex ms-7 d-flex"
                            style="justify-content: center;flex-direction: column;align-items: center">
                            <a class="text-danger d-flex" href={{ route('site.login') }}>
                                <img height="50px" class="mr-1" src={{ asset('images/login-.gif') }} alt="">
                                {{-- <i class="fa-regular fa-circle-user fs-3"></i>                               --}}
                            </a>
                            <div style="font-size: 11px" class="mt-2">
                                Đăng nhập
                            </div>
                        </li>
                        <li style="justify-content: space-between;flex-direction: column;align-items: center"
                            class="d-flex fs-4 ms-5 9">
                            <a class="text-danger fs-3 d-flex mb-3" href="#">
                                <img height="50px" class="mr-1" src={{ asset('images/save-money.gif') }}
                                    alt="">
                                {{-- <i class="fa-solid fa-bag-shopping"></i> --}}
                            </a>
                            <div style="font-size: 11px" class="mt-1">
                                Giỏ hàng
                            </div>
                        </li>

                        <li style="justify-content: space-between;flex-direction: column;align-items: center"
                            class="d-flex ms-5 search relative">
                            <a class="text-danger" href="#">
                                <img height="50px" class="mr-1" src={{ asset('images/job-seeking.gif') }}
                                    alt="">
                                {{-- <i class="fa-solid fs-3 fa-magnifying-glass"></i> --}}
                            </a>
                            <div style="font-size: 11px" class="">
                                Tìm kiếm
                            </div>
                            <div class="search-content" style="position: absolute;right: 60px;top :80px">
                                <form action={{ route('site.search') }} class="d-flex" method="post">
                                    @csrf
                                    <input type="text"name="search" class="form-control" placeholder="Tìm kiếm"
                                        style="width: 300px;background: rgba(255, 199, 193, 0.774)">
                                    <button class="btn btn-white border" style="background: white;border: 1px solid #3333"> <img height="20px" class="mr-1"
                                            src={{ asset('images/job-seeking.gif') }} alt=""></button>
                                </form>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </header>

    @yield('content')
    <footer style="padding: 10px">
        <div class="container mt-3">
            <div class="row">
                <div class="col-6 mt-1">
                    {{-- <img class="mb-2" src="https://bizweb.dktcdn.net/100/368/327/themes/739207/assets/fot_logo.png?1663905788816" alt="">
                    <p>Câu chuyện của Evo Trang Sức bắt nguồn từ những thấu hiểu, cảm thông sâu sắc rất đời thường. Biết rằng cuộc sống không như mong đợi & đôi lúc yêu thương trốn tìm, Evo Trang Sức tin rằng mỗi món trang sức không dừng lại ở giá trị vật chất mà còn có sức mạnh khơi gợi, tôn vinh, những khoảnh khắc đẹp nhất, quý nhất của bạn & người thân yêu.</p> --}}
                    <h1>Thông tin liên hệ</h1>
                    <h3 class="text-warning"><i class="fa-solid fa-phone me-2"></i>0369973022</h3>
                    <p>Hoạt động tất cả các ngày trong tuần</p>
                    <p>Trụ sở chính: 28 Đường số 22, Phường Phước Long, Quận 4, Hồ Chí Minh City, Việt Nam</p>
                    <p>Hotline: 0336146709 (Cuộc gọi không tính phí)</p>
                    <p>Gọi mua: 0369973022 (phím 1)</p>
                    <p>Khiếu nại: 0369973022 (phím 2)</p>
                    <p>Cơ sở 1: 70 Lu Gia, Ward 15, District 11, Đà Nẳng City, Việt Nam</p>
                    <p>Cơ sở 2: 87 Diên Hồng, Hoài Thanh Tây, Bình Định, Việt Nam</p>
                    <p>Cơ sở 3: 59 Đường số 27, Phường 6, Hà Nội City, Việt Nam</p>
                    <p>Email: hongthom2810@gamil.com</p>
                </div>
                <div class="col mt-1">
                    <h5>ĐĂNG KÝ NHẬN TIN</h5>
                    <p>Nhận thông tin sản phẩm mới nhất, tin khuyến mãi và nhiều hơn nữa.</p>
                    <div class="input-group mb-3 w-50">
                        <input type="text" class="form-control" placeholder="Nhập email của bạn"
                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text bg-danger" id="basic-addon2">Đăng kí</span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6>THÔNG TIN CÔNG TY</h6>
                            <ul class="p-0 m-0">
                                <li class="mt-2">Trang chủ</li>
                                <li class="mt-2">Sản phẩm</li>
                                <li class="mt-2">Giới thiệu</li>
                                <li class="mt-2">Tin tức</li>
                                <li class="mt-2">Tuyển dụng</li>
                                <li class="mt-2">Liên hệ</li>
                            </ul>
                        </div>
                        <div class="col">
                            <h6>HỖ TRỢ KHÁCH HÀNG</h6>
                            <ul class="p-0 m-0">
                                <li class="mt-2">Hướng dẫn đo size</li>
                                <li class="mt-2">Chăm sóc khách hàng</li>
                                <li class="mt-2">Mua hàng trả góp</li>
                                <li class="mt-2">Hướng dẫn mua hàng và thanh toán</li>
                                <li class="mt-2">Chính sách giao hàng</li>
                            </ul>
                        </div>
                        <div>
                            <ul class="d-flex">
                                <img src="" alt="">
                                <li class="text-success ms-3 mt-3 fs-3"><i class="fa-brands fa-instagram"></i></li>
                                <li class="text-primary ms-3 mt-3 fs-3"><i class="fa-brands fa-facebook"></i></li>
                                <li class="text-info ms-3 mt-3 fs-3"><i class="fa-brands fa-twitter"></i></li>
                                <li class="text-durk ms-3 mt-3 fs-3"><i class="fa-brands fa-google"></i></li>
                                <li class="text-danger ms-3 mt-3 fs-3"><i class="fa-brands fa-youtube"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mt-3">
                            <h6>PHƯƠNG THỨC THANH TOÁN</h6>
                            <ul class="d-flex">
                                <img src="" alt="">
                                <li class="text-white ms-3 mt-3 fs-3"><i class="fa-brands fa-cc-visa"></i></li>
                                <li class="text-white ms-3 mt-3 fs-3"><i class="fa-brands fa-cc-mastercard"></i></li>
                                <li class="text-white ms-3 mt-3 fs-3"><i class="fa-brands fa-cc-jcb"></i></li>
                                {{-- <li class="text-white ms-3 mt-3 fs-3"></li> --}}
                                {{-- <img class="img-lazyload incon-cod" data-src alt style="opacity: 1" src="https://pnj.com.vn/design/themes/pnjrovski/media/images/payments/thanhtoantienmat.svg"> --}}
                                <li class="text-white ms-3 mt-3 fs-3"></li>
                                <li class="text-white ms-3 mt-3 fs-3"></li>
                            </ul>
                        </div>
                        {{-- <div>
                            <h2>CHỨNG NHẬN</h2>
                        </div> --}}

                    </div>

                </div>

            </div>

        </div>
        {{-- <div class="padding ">
            <div class="bocuc  bocuc_19  ">
                <div class="loprong">
                    <div class="padding ">
                        <p>Copyright © MỸ PHẨM LINH HƯƠNG <span style="color: #ee2d36;"><a style="color: #ee2d36;"
                                    title="màn hình led" href="https://ledso1.com">màn hình led</a></span></p>
                    </div>
                </div>
            </div>
            <div class="bocuc  bocuc_76  ">
                <div class="loprong">
                    <div class="padding "><img class="scrollup" src="files/assets/nh_s_kin/gototoppng1.png"
                            style="display: inline;"></div>
                </div>
            </div>
        </div> --}}
    </footer>
    {{-- <style>
        #snowflakeContainer {
            position: absolute;
            left: 0px;
            top: 0px;
        }

        .snowflake {
            padding-left: 15px;
            font-size: 14px;
            line-height: 24px;
            position: fixed;
            color: #ebebeb;
            user-select: none;
            z-index: 1000;
            -moz-user-select: none;
            -ms-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        .snowflake:hover {
            cursor: default
        }
    </style>
    <div id='snowflakeContainer'>
        <p class='snowflake'>❄</p>
    </div>
    <script style='text/javascript'>
        //<![CDATA[
        var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window
            .webkitRequestAnimationFrame || window.msRequestAnimationFrame;
        var transforms = ["transform", "msTransform", "webkitTransform", "mozTransform", "oTransform"];
        var transformProperty = getSupportedPropertyName(transforms);
        var snowflakes = [];
        var browserWidth;
        var browserHeight;
        var numberOfSnowflakes = 50;
        var resetPosition = false;

        function setup() {
            window.addEventListener("DOMContentLoaded", generateSnowflakes, false);
            window.addEventListener("resize", setResetFlag, false)
        }
        setup();

        function getSupportedPropertyName(b) {
            for (var a = 0; a < b.length; a++) {
                if (typeof document.body.style[b[a]] != "undefined") {
                    return b[a]
                }
            }
            return null
        }

        function Snowflake(b, a, d, e, c) {
            this.element = b;
            this.radius = a;
            this.speed = d;
            this.xPos = e;
            this.yPos = c;
            this.counter = 0;
            this.sign = Math.random() < 0.5 ? 1 : -1;
            this.element.style.opacity = 0.5 + Math.random();
            this.element.style.fontSize = 4 + Math.random() * 30 + "px"
        }
        Snowflake.prototype.update = function() {
            this.counter += this.speed / 5000;
            this.xPos += this.sign * this.speed * Math.cos(this.counter) / 40;
            this.yPos += Math.sin(this.counter) / 40 + this.speed / 30;
            setTranslate3DTransform(this.element, Math.round(this.xPos), Math.round(this.yPos));
            if (this.yPos > browserHeight) {
                this.yPos = -50
            }
        };

        function setTranslate3DTransform(a, c, b) {
            var d = "translate3d(" + c + "px, " + b + "px, 0)";
            a.style[transformProperty] = d
        }

        function generateSnowflakes() {
            var b = document.querySelector(".snowflake");
            var h = b.parentNode;
            browserWidth = document.documentElement.clientWidth;
            browserHeight = document.documentElement.clientHeight;
            for (var d = 0; d < numberOfSnowflakes; d++) {
                var j = b.cloneNode(true);
                h.appendChild(j);
                var e = getPosition(50, browserWidth);
                var a = getPosition(50, browserHeight);
                var c = 5 + Math.random() * 40;
                var g = 4 + Math.random() * 10;
                var f = new Snowflake(j, g, c, e, a);
                snowflakes.push(f)
            }
            h.removeChild(b);
            moveSnowflakes()
        }

        function moveSnowflakes() {
            for (var b = 0; b < snowflakes.length; b++) {
                var a = snowflakes[b];
                a.update()
            }
            if (resetPosition) {
                browserWidth = document.documentElement.clientWidth;
                browserHeight = document.documentElement.clientHeight;
                for (var b = 0; b < snowflakes.length; b++) {
                    var a = snowflakes[b];
                    a.xPos = getPosition(50, browserWidth);
                    a.yPos = getPosition(50, browserHeight)
                }
                resetPosition = false
            }
            requestAnimationFrame(moveSnowflakes)
        }

        function getPosition(b, a) {
            return Math.round(-1 * b + Math.random() * (a + 2 * b))
        }

        function setResetFlag(a) {
            resetPosition = true
        };
        //]]>
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

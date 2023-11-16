@extends('layout.site')

@section('content')
    <div style="margin-top: 150px" class="container ">

        <h1 class="text-center  mb-5 text-uppercase">ĐĂNG NHẬP</h1>
        <form action="{{ route('site.loginpost') }}" method="post" class="w-50 mx-auto border border-primary p-5 rounded">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-between">
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <div>
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label for="exampleInputPassword1" class="form-label">Quên mật khẩu</label>
                </div>
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary me-5">Đăng nhập</button>
                <a href={{ route('site.register') }} class="btn btn-danger ">Đăng ký</a>
            </div>
            <div class="text-danger mt-2">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </form>

    </div>
@endsection

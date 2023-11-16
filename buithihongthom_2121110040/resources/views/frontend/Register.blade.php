@extends('layout.site')

@section('content')
    <div style="margin-top: 150px" class="container ">

        <h1 class="text-center font2 mb-5 text-uppercase">ĐĂNG KÝ</h1>
        <form action="{{ route('site.registerpost') }}" method="post" class="w-50 mx-auto border border-primary p-5 rounded">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Enter Password</label>
                <input type="password" name="enterpassword" class="form-control" id="exampleInputPassword1">
            </div>
            
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary me-5">Đăng Ký</button>
                <a href={{ route("site.login") }} class="btn btn-danger ">Đăng nhập</a>
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

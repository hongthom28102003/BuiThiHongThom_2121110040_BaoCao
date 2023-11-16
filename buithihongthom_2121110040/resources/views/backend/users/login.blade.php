<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>Đăng nhập hệ thống</title>
    <style>
        .khung{
            max-width: 600px;
            /* text-align: center; */
            border: 1px solid black;
            border-radius: 10px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="khung mt-5">
        <form action="{{ route('admin.postlogin') }}" method="post">
            @csrf
            <div class="container p-3">
                <h3 class="text-center text-danger">ĐĂNG NHẬP</h3>

                <div class="mb-3">
                    <label for="username">
                        <strong>Tên đăng nhập (*)</strong>
                    </label>
                    <input type="text" placeholder="Tên đăng nhập hoặc email" name="username" id="username" class="form-control mt-2">
                </div>

                <div class="mb-3">
                    <label for="password">
                        <strong>Mật khẩu (*)</strong>
                    </label>
                    <input type="password" placeholder="Nhập mật khẩu" name="password" id="password" class="form-control mt-2">
                </div>


                <div class="mb-3">
                    <button type="submit" class="btn btn-success form-control">
                        ĐĂNG NHẬP 
                    </button>
                </div>

                <div class="mb-3">
                    @isset($error)
                        <div class="text-danger">{{ $error }}</div>
                    @endisset
                </div>
                
            </div>
        </form>
    </div>
</body>
</html>
@extends('layout.admin')
@section('title', 'Thùng rác thương hiệu sản phẩm')
@section('content')

    <div class="content-wrapper"> 
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>THÙNG RÁC THƯƠNG HIỆU</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-brand"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                            <li class="breadcrumb-brand active">Thùng rác thương hiệu</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row"> 
                        <div class="col-md-6">
                            <button class="btn btn-danger"type="submit"><i class="fa-sharp fa-solid fa-calendar-xmark"></i>
                                Xóa
                            </button>
                        </div>
                        <div class="col-md-6 text-right">
                            
                            <a href="{{ route('brand.index') }}" class="btn bg-dark">
                                <i class="fa-solid fa-rotate-left"></i>
                                Quay về danh sách </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">

                @if (session('message'))
                    @php
                        
                        $arrmessage = session('message');
                        
                    @endphp
                    <div class="alert alert-success" role="alert">
                        <strong> Thông Báo </strong> {{ $arrmessage['msg'] }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:20px;" class="text-center">Chọn</th>
                            <th class="text-center" style="width:140px;" >Hình</th>
                            <th class="text-center">Tên danh mục</th>
                            <th class="text-center">Slug</th>
                            <th style="width:100px;" class="text-center ml-10"> Ngày Đăng </th>
                            <th class="text-center">Chức năng</th>
                            <th class="text-center">Id</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($brand as $brand)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center">
                                    <img width="50px" height="50px" src="{{ asset('images/brand/'. $brand->image ) }}" alt="">
                                </td>
                                <td class="text-center">{{ $brand->name }}</td>
                                <td class="text-center">brand</td>
                                <td class="text-center">{{ $brand->created_at }}</td>
                                <td class="text-center d-flex justify-content-center">
                                    <a href="{{ route('brand.restore', ['brand' => $brand->id]) }}" {{-- đường dẫn khi nhấp vào edit có tham số truyền vào nên phải có ->id  --}}
                                        class="btn btn-sm btn-success mr-2">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </a>
                                    <form action="{{ route('brand.destroy',['brand'=>$brand->id]) }}" method="POST" >
                                        @method('DELETE')
                                        @csrf
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"> </i>
                                    </button>
                                    </form>
                                   
                                </td>
                                <td class="text-center">{{ $brand->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
            <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

@endsection

@extends('layout.admin')
@section('title', 'TRANG QUẢN TRỊ')

@section('header')
<link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
<script src="{{ asset('jquery/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('dataTables/jquery.dataTables.min.js') }}"></script>
<script>
    $(document).ready(function(){
    $('#myTable').DataTable();
    });
  </script>
@endsection



@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Brand</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
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
                    <h3 class="card-title">THƯƠNG HIỆU</h3>

                    <div class="card-tools">
                        <a href="{{ route('brand.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('brand.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> Thùng
                            rác 
                        </a>
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
                    {{-- @if (session('message'))
                        @php
                            $arrmessage = session('message');
                        @endphp
                        <table class="table table-bodered" id='myTable'>
                        <div class="alert alert-success" role="alert">
                            <strong> Thông Báo </strong> {{ $arrmessage['msg'] }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif --}}

                    <table class="table table-bordered" id="myTable">                        
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                {{-- <th scope="col">Slug</th> --}}
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Chức năng</th>
                                <th scope="col">Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $brand)
                                <tr>
                                    {{-- <th scope="row">{{ $brand->id }}</th> --}}
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        <img width="50px" height="50px" src="{{ asset('images/brand/'. $brand->image ) }}" alt="">
                                    </td>
                                    <td>{{ $brand->name }}</td>
                                    {{-- <td>{{ $brand->slug }}</td> --}}

                                    <td>{{ $brand->created_at }}</td>
                                    <td>   
                                        @if ($brand->status == 1)
                                            <a href="{{ route('brand.status',['brand'=>$brand->id]) }}" class="btn bg-success">
                                              <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        @else
                                            <a href="{{ route('brand.status',['brand'=>$brand->id]) }}" class="btn bg-danger">
                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                            </a> 
                                        @endif                                      
                                            <a href="{{ route('brand.show', ['brand' => $brand->id]) }}" class="btn bg-info">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="{{ route('brand.edit', ['brand' => $brand->id]) }}" class="btn bg-dark">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a href="{{ route('brand.delete', ['brand' => $brand->id]) }}"class="btn bg-danger">
                                                <i class="fa-solid fa-trash"></i> 
                                            </a>
                                    </td>
                                    <td>{{ $brand->id }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
   
@endsection

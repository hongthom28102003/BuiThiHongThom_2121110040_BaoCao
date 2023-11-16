@extends('layout.admin')
@section('title', 'LIÊN HỆ')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                CONTACT
                            </strong>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Bảng điều khiển</a></li>
                            <li class="breadcrumb-item active">Thêm thương hiệu</li>
                        </ol>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <strong>
                                LIÊN HỆ
                            </strong>
                        </h3>
                        <div class="card-tools">
                            <a href="{{ route('product.index') }}" class="btn bg-dark">
                                <i class="fa-solid fa-rotate-left"></i>
                                Quay về danh sách </a>
                            <button type="submit" class="btn bg-success">
                                <i class="fa-regular fa-floppy-disk"></i> Lưu Thêm
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div>
                                    {{-- <label for="" class="form-label">Tên thương hiệu</label> --}}
                                    <label for="" class="text-dark">Tên liên hệ</label>
                                    <input type="text" name="name" list="name"
                                        placeholder="Nhập vào tên thương hiệu" class="form-control">
                                    <datalist id="name">
                                        <option value="Sữa rửa mặt">
                                        <option value="Nước hoa">
                                        <option value="Son">
                                        <option value="Kem chống nắng">
                                        <option value="Kem nền">
                                    </datalist>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <textarea class="form-control" name="email" id="" cols="30" rows="5" placeholder="Nhập email"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <textarea name="phone" class="form-control" id="" cols="30" rows="5"
                                        placeholder="Nhập số điện thoại"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="form-label">Tiêu đề</label>
                                    <textarea name="title" class="form-control" id="" cols="30" rows="5" placeholder="Nhập tiêu đề"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label for="" class="form-label">Nội dung</label>
                                    <textarea name="content" class="form-control" id="" cols="30" rows="5" placeholder="Nhập nội dung"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="text-dark">replay</label>
                                    <select name="replay" class="form-control">
                                        <option>Chọn replay</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id + 1 }}">sau: {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="text-dark">userid</label>
                                    <select name="user_id" class="form-control">
                                        <option>Chọn userid</option>
                                        @foreach ($brand as $item)
                                            <option value="{{ $item->id + 1 }}">sau: {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Nội dung</label>
                                    <textarea class="form-control" name="content" id="" cols="30" rows="5" placeholder="Nhập nội dung"></textarea>
                                    @if ($errors->any())
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif
                                </div>
                                <div>
                                    <label for="" class="text-dark">Người sử dụng</label>
                                    <select class="form-control" name="user_id" id="">
                                        <option>Chọn người sử dụng</option>
                                        {!! $html !!}
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="text-dark">Số lượng sử dụng</label>
                                    <select class="form-control" name="replay_id" id="">
                                        <option>Chọn số lượng sử dụng</option>
                                        {!! $html1 !!}
                                    </select>
                                </div>
                                {{-- <div>
                                <label for="" class="form-label">Vị trí</label>
                                <select name="sort_order" class="form-control">
                                    <option>Chọn vị trí </option>
                                    @foreach ($contact as $item)
                                    <option value="{{ $item->id+1 }}" >Sau: {{ $item->name }} </option>
                                    @endforeach
                                </select>
                            </div>  --}}

                                <div>
                                    <label for="" class="form-label">Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Chọn trạng thái</option>
                                        <option value="1">Bật</option>
                                        <option value="2">Tắt</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        Footer
                    </div>
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
            </form>
        </section>
        <!-- /.content -->
    </div>

@endsection

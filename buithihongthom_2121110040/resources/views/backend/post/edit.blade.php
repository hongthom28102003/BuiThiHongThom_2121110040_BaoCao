@extends('layout.admin')
@section('title', 'trang quan tri')
@section('header')

@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

        </section>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">



                <div class="card-body">
                    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1 class="text-danger"> Cập nhập thương hiệu</h1>
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
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-save"></i> Lưu[Thêm]
                                            </button>
                                            <a class="btn btn-sm btn-info" href="{{ route('post.index') }}">
                                                <i class="fas fa-undo-alt"></i> Quay về
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div>
                                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                                <label for="" class="text-dark">title</label>
                                                <input value="{{ $post->title }}" type="text" name="title" class="form-control">
                                               
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                                <label for="" class="text-dark">Metakey</label>
                                                <textarea class="form-control" name="metakey" id="" cols="30" rows="5" placeholder="Từ khóa">{{ $post->metakey }}</textarea>
                                                @if ($errors->any())
                                                    <span class="text-danger">{{ $errors->first('metakey') }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Metadesc</label> --}}
                                                <label for="" class="text-dark">Metadesc</label>
                                                <textarea name="metadesc" class="form-control" id="" cols="30" rows="5"
                                                    placeholder="Nhập mô tả thương hiệu">{{ $post->metadesc }}</textarea>
                                                @if ($errors->any())
                                                    <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Metadesc</label> --}}
                                                <label for="" class="text-dark">Detail</label>
                                                <textarea name="detail" class="form-control" id="" cols="30" rows="5"
                                                    placeholder="Nhập chi tiết sản phẩm">{{ $post->detail }}</textarea>
                                                @if ($errors->any())
                                                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <label for="">topic</label>
                                                <select class="form-control" name="topic_id" id="">
                                                    @foreach ($topic as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Metadesc</label> --}}
                                                <label for="" class="text-dark">Type</label>
                                                <textarea name="type" class="form-control" id="" cols="30" rows="5" placeholder="Nhập kiểu">{{ $post->type }}</textarea>
                                                @if ($errors->any())
                                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                                @endif
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Hình</label> --}}
                                                <label for="" class="text-dark">Hình</label>
                                                <img src="public/images/post/son.jpg" alt="" srcset="">
                                                <input type="file" class="form-control" name="image" id="">
                                            </div>
                                            <div>
                                                {{-- <label for="" class="form-label">Trạng thái</label> --}}
                                                <label for="" class="text-dark">Trạng thái</label>
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
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <button name="THEM" type="submit" class="btn btn-sm btn-primary">
                                                <i class="fas fa-save"></i> Lưu[Thêm]
                                            </button>
                                            <a class="btn btn-sm btn-info" href="{{ route('post.index') }}">
                                                <i class="fas fa-undo-alt"></i> Quay về danh sách
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- /.content -->
                    </form>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
    </div>

@endsection

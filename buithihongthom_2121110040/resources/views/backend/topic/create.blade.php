@extends('layout.admin')
@section('title', 'CHỦ ĐỀ BÀI VIẾT')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-danger">
                            <strong>
                                topic
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
          <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <strong>
                            THÊM chủ đề
                        </strong>
                    </h3>

                    <div class="card-tools">
                        <a href="{{ route('product.index') }}" class="btn bg-dark">
                            <i class="fa-solid fa-rotate-left"></i>
                            Quay về danh sách </a>
                        <button type="submit" class="btn bg-success"><i class="fa-regular fa-floppy-disk"></i> Lưu Thêm
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <div>
                                {{-- <label for="" class="form-label">Tên thương hiệu</label> --}}
                                <label for="" class="text-dark">Tên </label>
                                <input type="text" name="name" list="name" placeholder="Nhập vào tên thương hiệu" class="form-control">
                                
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div>
                                {{-- <label for="" class="form-label">Metakey</label> --}}
                                <label for="" class="text-dark">Metakey</label>
                                <textarea class="form-control" name="metakey" id="" cols="30" rows="5" placeholder="Từ khóa"></textarea>
                                @if($errors->any())
                                <span class="text-danger">{{ $errors->first('metakey') }}</span>
                                @endif
                            </div>
                            <div>
                              {{-- <label for="" class="form-label">Metadesc</label> --}}
                              <label for="" class="text-dark">Metadesc</label>
                              <textarea name="metadesc" class="form-control" id="" cols="30" rows="5" placeholder="Nhập mô tả thương hiệu"></textarea>
                              @if($errors->any())
                              <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                              @endif
                          </div>
                        </div>
                        <div class="col-4">
                            <div>
                                {{-- <label for="" class="form-label">Trạng thái</label> --}}
                                <label for="" class="text-dark">parent_id</label>
                                <select name="parent_id" class="form-control">
                                    @foreach ($topics as $item )
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                            <div>
                              {{-- <label for="" class="form-label">Hình</label> --}}
                              <label for="" class="text-dark">Hình</label>
                              <img src="public/images/topic/son.jpg" alt="" srcset="">
                              <input type="file" class="form-control" name="image" id="">
                          </div>
                            <div>
                              {{-- <label for="" class="form-label">Trạng thái</label> --}}
                              <label for="" class="text-dark">Trạng thái</label>
                              <select name="status" class="form-control">
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

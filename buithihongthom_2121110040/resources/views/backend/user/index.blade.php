@extends('layout.admin')
@section('title', 'TRANG QUẢN TRỊ')
@section('header')
    <link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('jquery/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('dataTables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
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
                        <h1>User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-user"><a href="#">Home</a></li>
                            <li class="breadcrumb-user active">Blank Page</li>
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
                    <h3 class="card-title">KHÁCH HÀNG</h3>

                    <div class="card-tools">
                        <a href="{{ route('user.create') }}" class="btn bg-success"><i class="fa-solid fa-plus"></i>Thêm</a>
                        <a href="{{ route('user.trash') }}" class="btn bg-danger"><i class="fa-solid fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Liên lạc</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $user)
                                <tr>
                                    {{-- <th scope="row">{{ $user->id }}</th> --}}
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        @if ($user->status == 1)
                                            <a href="{{ route('user.status', ['user' => $user->id]) }}" class="btn bg-success">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('user.status', ['user' => $user->id]) }}" class="btn bg-danger">
                                                <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                            </a>
                                        @endif
                                        <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn bg-info">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn bg-dark">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                        <a href="{{ route('user.delete', ['user' => $user->id]) }}"class="btn bg-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
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

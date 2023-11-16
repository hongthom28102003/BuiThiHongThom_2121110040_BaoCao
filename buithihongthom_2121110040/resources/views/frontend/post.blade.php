@extends('layout.site')

@section('content')
    <div style="margin-top: 150px" class="container ">
        <h1 class="text-center font2">Tất cả bài viết</h1>
        @foreach ($list_post as $item)
            <div class="card mb-3">
                <div class="row g-0">

                    <div class="col-md-4">
                        <a href={{ $item->slug }}>
                            <img src="{{ asset('images/posts/' . $item->image) }}" class="img-fluid rounded-start"
                                alt="...">
                        </a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href={{ $item->slug }}>
                                <h5 class="card-title">{{ $item->title }}</h5>
                            </a>
                            <p class="card-text">{{ $item->detail }}</p>
                            <p class="card-text"><small class="text-body-secondary">{{ $item->created_at }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
@endsection

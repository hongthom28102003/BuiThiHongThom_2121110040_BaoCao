@extends('layout.site')

@section('content')
    <div style="height: 200px;margin:200px 0;padding: 20px;margin-bottom: 300px" class="">
       <div>
           <h1 class="text-center">{{ $postdetail->title }}</h1>
        <img style="width: 200px;" src={{ asset('images/posts/' . $postdetail->image) }} alt="">
       </div>
       <div class="mb-5">
        {{ $postdetail->detail }}
       </div>
    </div>
    
@endsection

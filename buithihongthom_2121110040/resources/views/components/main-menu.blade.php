@foreach ($menus as $menu)
    <x-main-sub-menu :menu="$menu" />
@endforeach

<div class="box" style="padding-left: 50px">
    {{-- <div class="bg-success">
        <input type="text" placeholder="Search">
    </div> --}}
    {{-- <form class="form-inline" action="/search" method="POST">
        {{ @csrf_field()}}
        <input class="input" type="text" name="q" placeholder="Nhập từ khóa cần tìm kiếm">
        <button class="search-btn" type="submit">Tìm kiếm</button>
    </form> --}}
        {{-- <form class="form-inline d-flex" action="/search" method="POST">
            {{ @csrf_field() }}
            <input class="input" type="text" name="q" placeholder="Nhập từ khóa cần tìm kiếm">
            <button class="search-btn" type="submit">Tìm kiếm</button>
        </form> --}}
</div>

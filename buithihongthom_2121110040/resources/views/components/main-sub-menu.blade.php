<style>
    .nav-dropdow {
        position: relative;
    }

    .nav-dropdow ul {
        display: none;
        background: #fff;
        position: absolute;
        left: 0;
        margin: 0;
        padding: 0;

    }

    .nav-dropdow ul li {

        border: 1px solid #ccc;

    }

    .nav-dropdow ul li:hover {

        background: rgba(198, 99, 99, 0.3);

    }

    .nav-dropdow ul li a {
        width: max-content;

    }

    .nav-dropdow:hover ul {
        display: block;

    }
</style>

@if (count($menus) > 0)
    <li class="ms-4 fs-5 nav-dropdow ">
        <a class="nav-link nav1 fs-6" href="{{ $menurow->link }}">{{ $menurow->name }}
        </a>
        <ul>
            @foreach ($menus as $menu)
                <li class="p-3">
                    <a class="nav-link d-block fs-6" href="{{ $menu->link }}">{{ $menu->name }}</a>
                </li>
            @endforeach
        </ul>
    </li>
@else
    <li class="ms-4 fs-5"><a class="nav-link nav1 fs-6" href="{{ $menurow->link }}">{{ $menurow->name }}</a></li>
    {{-- <li>
        <a class="nav-link" href="{{ $menurow->link }}">{{ $menurow->name }}</a>
    </li> --}}
@endif

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @php
            $i = 0;
        @endphp
        @foreach ($sliders as $item)
            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}" data-bs-interval="10000">
                <img height="500px" src="{{ asset('images/slider/' . $item->image) }}" class="d-block w-100" alt="...">
            </div>
            @php
                $i++;
            @endphp
        @endforeach


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

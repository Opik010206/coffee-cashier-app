{{-- <div class="row row-cols-1 row-cols-md-3">
  @foreach ($jenis as $j)    
    <div class="col mb-3">
      <div class="card">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <div class="d-flex items-center justify-content-between">
            <h5 class="card-title">{{ $j->nama }}</h5>
            @foreach ($j->menu as $menu)  
              <h6 class="text-primary">{{ $menu->nama }}</h6>
            @endforeach
          </div>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  @endforeach
</div> --}}



@foreach ($jenis as $j)
  <h3>{{ $j->nama }}</h3>
  <div class="row row-cols-1 row-cols-md-3 my-2">
    @foreach ($j->menu as $menu)
      <div class="col mb-3">
        <div class="card">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <div class="d-flex items-center justify-content-between">
              <h5 class="card-title">{{ $menu->nama }}</h5>
            </div>
            <p class="card-text">{{ $menu->deskripsi }}</p>
            <a href="#" class="btn btn-primary">Rp. {{ $menu->harga }}</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endforeach
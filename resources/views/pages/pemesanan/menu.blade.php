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


<div class="card tale-bg px-3 pt-3">
  <div class="content">
    <div class="d-flex align-items-center justify-content-between">
      @foreach ($jenis as $j)
      <a class="btn btn-outline-primary btn-sm">
        {{ $j->nama }}
      </a>
      @endforeach
    </div>
  </div>
  <div class="menu-item mx-0 my-3 px-2">
    @foreach ($jenis as $j)
    <div class="row row-col-4">
      @foreach ($j->menu as $menu)
      <div class="col bg-light rounded mx-1 my-2" >
        <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
          <img src="{{ asset('storage/' . $menu->image) }}" class="ms-auto mt-2" alt="" style="width: 80px;">
          <h5 class="text-center mt-3 menu" data-id="{{ $menu->id }}" data-harga="{{ $menu->harga }}">{{ $menu->nama }}</h5>
          <p class="text-center">Rp. {{ $menu->harga }}</p>
        </div>
        {{-- <div class="menu" data-id="{{ $menu->id }}" data-harga="{{ $menu->harga }}">
        </div> --}}
      </div>
      @endforeach
    </div>
    @endforeach
  </div>
</div>


<!-- Contoh elemen HTML dengan atribut data -->
{{-- <div id="myElement" class="element" data-id="123" data-name="John" data-age="25">Halo</div>
<div class="id">Id : </div>
<div class="name">Name : </div>
<div class="age">Age : </div> --}}


@push('script')
  <script>
    // let tagId = $('.id');
    // let tagName = $('.name');
    // let tagAge = $('.age');
    // $('.element').click(function() {
    //   const data = $('#myElement')[0].dataset;
    //   const id = data.id;
    //   const name = data.name;
    //   const age = data.age;

    //   tagId.append(id);
    //   tagName.append(name);
    //   tagAge.append(age);

    //   console.log(data.id);    // Output: 123
    //   console.log(data.name);  // Output: John
    //   console.log(data.age);   // Output: 25
    // });

    $(function(){
      const orderedList = []
      
      $('.menu-item .row .col .menu').click(function(){
        // console.log('halo');
        const menu_clicked = $(this).text();
        const data = $(this)[0].dataset;
        const id = $(this).data('id');
        const harga = $(this).data('harga');

        if(orderedList.lengt !== 0 && orderedList.some(list => list.id === id)){
          let index = orderedList.findIndex(list => list.id === id)
          orderedList[index].qty += 1;
        }else {
          let dataN = {'id' : id, 'menu' : menu_clicked, 'harga' : harga, 'qty' : 1}
          orderedList.push(dataN);
        }
        $('.ordered-list .list-menu').remove()
        // $('.ordered-list .total').remove()
        orderedList.forEach(function(data){
          $('.ordered-list').append(
            '<div class="d-flex align-items-center justify-content-between list-menu">' + 
              '<p>' + data.menu + '</p>' + 
              '<p> Rp. ' + data.harga * data.qty + '</p>' +
            '</div>'
            // '<p>' + data.menu + ' Rp. ' + data.harga * data.qty + '</p>'
          )
        })
        // console.log('halo')
      })
    })
  </script>
@endpush
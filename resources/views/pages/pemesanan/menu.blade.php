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


<div class="menu-container">
  @foreach ($jenis as $j)
    <div class="">
      <h3>{{ $j->nama }}</h3>
      <div class="menu-item row row-cols-3 row-cols-md-5">
        @foreach ($j->menu as $menu)
            <button type="button" class="menu btn btn-primary" data-id="{{ $menu->id }}" data-harga="{{ $menu->harga }}">{{ $menu->nama }}</button>
        @endforeach
      </div>
    </div>
  @endforeach
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
      
      $('.menu-item button').click(function(){
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

      orderedList.forEach(function(data){
        
      })
    })
  </script>
@endpush
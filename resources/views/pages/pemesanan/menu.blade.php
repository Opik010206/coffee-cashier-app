<div class="card tale-bg px-3 pt-3">
  <div class="content">
    <div class="row align-items-center justify-content-between px-4">
      <a href="/pemesanan" class="btn btn-outline-primary btn-sm nav-link {{ Request::is('/pemesanan') ? 'active' : '' }}">All</a>
      @foreach ($jenis as $j)
        {{-- <a href="jenis/{{ $j->id }}" data-id="{{ $j->id }}" class="jenis-button btn btn-outline-primary btn-sm nav-link mt-2{{ Request::is('jenis/'. $j->id) ? 'active' : '' }}">
          {{ $j->nama }}
        </a> --}}

        <button class="jenis-button btn btn-outline-primary btn-sm" data-id="{{ $j->id }}" data-menu="{{ $j->menu }}">
          {{ $j->nama }}
        </button>

      @endforeach
    </div>
  </div>
  <div class=" mx-0 my-3 px-3" id="menu-container">
    <div class="row row-col-4">
    {{-- @foreach ($jenis as $j) --}}
      @foreach ($menus as $menu)
        <div class="col bg-light rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama }}" data-harga="{{ $menu->harga }}" data-jenis_id="{{ $menu->jenis_id }}">
          <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
            <img src="{{ asset('storage/' . $menu->image) }}" class="ms-auto mt-2" alt="" style="width: 80px;">
            <h5 class="text-center mt-3 menu">{{ $menu->nama }}</h5>
            <p class="text-center">Rp. {{ $menu->harga }}</p>
          </div>
          {{-- <div class="menu" data-id="{{ $menu->id }}" data-harga="{{ $menu->harga }}">
          </div> --}}
        </div>
        
      @endforeach
    {{-- @endforeach --}}
    </div>
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

    // $(function(){
    //   const orderedList = []
      
    //   $('.menu-item .row .col .menu').click(function(){
    //     // console.log('halo');
    //     const menu_clicked = $(this).text();
    //     const data = $(this)[0].dataset;
    //     const id = $(this).data('id');
    //     const harga = $(this).data('harga');

    //     if(orderedList.lengt !== 0 && orderedList.some(list => list.id === id)){
    //       let index = orderedList.findIndex(list => list.id === id)
    //       orderedList[index].qty += 1;
    //     }else {
    //       let dataN = {'id' : id, 'menu' : menu_clicked, 'harga' : harga, 'qty' : 1}
    //       orderedList.push(dataN);
    //     }
    //     $('.ordered-list .list-menu').remove()
    //     // $('.ordered-list .total').remove()
    //     orderedList.forEach(function(data){
    //       $('.ordered-list').append(
    //         '<div class="d-flex align-items-center justify-content-between list-menu">' + 
    //           '<p>' + data.menu + '</p>' + 
    //           '<p> Rp. ' + data.harga * data.qty + '</p>' +
    //         '</div>'
    //         // '<p>' + data.menu + ' Rp. ' + data.harga * data.qty + '</p>'
    //       )
    //     })
    //     // console.log('halo')
    //   })
    // })
    
    // Fungsi Jenis
    $(function(){
      $('.jenis-button').click(function() {
          const jenisId = $(this).data('id');
          const menu = $(this).data('menu');
          let nama_menu = $(this).data('nama');

          let conten = `<div class="col bg-light rounded mx-1 my-2 menu-item" data-id="{{ $menu->id }}" data-nama="{{ $menu->nama }}" data-harga="{{ $menu->harga }}" data-jenis_id="{{ $menu->jenis_id }}">
          <div class="d-flex flex-column align-items-center justify-content-between" style="height: 100%;">
            <img src="{{ asset('storage/' . $menu->image) }}" class="ms-auto mt-2" alt="" style="width: 80px;">
            <h5 class="text-center mt-3 menu">{{ $menu->nama }}</h5>
            <p class="text-center">Rp. {{ $menu->harga }}</p>
          </div>
        </div>`;
          // console.log(jenisId)
          $.ajax({
              url: '/jenis/' + jenisId,
              method: 'GET',
              success: function(response) {
                  // Memuat konten yang dimuat dalam div atau elemen lain
                  // $('#menu-container').reload();
                  console.log(menu)
                  // $('#menu-container').html(menu['nama'])
                  $('#menu-container').html(conten)
              },
              error: function(xhr, status, error) {
                  console.error(error);
              }
          });
      });
    })

    // Fungsi menu
    $(function(){
      const orderedList = [];
      const total = 0;

      const sum = () => {
        return orderedList.reduce((accumulator, object) => {
          return accumulator + (object.harga * object.qty);
        }, 0)
      };

      const changeQty = (el, inc) => {
        const id = $(el).closest('.li')[0].dataset.id;
        // console.log(id);
        const index = orderedList.findIndex(list => list.menu_id == id)
        orderedList[index].qty += orderedList[index].qty == 1 && inc == -1 ? 0 : inc

        const txt_subtotal = $(el).closest('.li').find('.subtotal')[0];
        const txt_qty = $(el).closest('.li').find('.qty-item')[0];
        txt_qty.value = parseInt(txt_qty.value) == 1 && inc == -1 ? 1 : parseInt(txt_qty.value) + inc;
        txt_subtotal.innerHTML = orderedList[index].harga * orderedList[index].qty;

        $('#total').html(sum());
      }

      $('.ordered-list').on('click', '.btn-dec', function(){changeQty(this, -1)})
      $('.ordered-list').on('click', '.btn-inc', function(){changeQty(this, 1)})
      
      $('.ordered-list').on('click', '.remove-item', function(){
        const item = $(this).closest('.li')[0];
        let index = orderedList.findIndex(list => list.menu_id == parseInt(item.dataset.id));
        orderedList.splice(index, 1);
        $(item).remove();
        $('#total').html(sum());
      });

      $('.menu-item').click(function(){ 
        // const menu_clicked = $(this).text();
        const data = $(this)[0].dataset;
        const nama = $(this).data('nama');
        const harga = parseFloat(data.harga);
        const id = parseInt(data.id);
        // console.log(nama)

        if(orderedList.every(list => list.menu_id !== id)) {
          let dataNan = {'menu_id': id, 'nama': nama, 'harga': harga, 'qty': 1}
          orderedList.push(dataNan);
          let listOrder = `
            <div class="col mb-3 px-2 li" data-id="${id}">
              <div class="d-flex align-items-center justify-content-between card py-2 rounded" style="border-left: 10px solid orange;">
                  <h4 class="mt-1">${nama}</h4>
                  <div class="d-flex align-items-center justify-content-between">
                      <h5 class="mt-2 mr-3">Rp. <span class="subtotal">${harga * 1}</span></h5>
                      <div class="d-flex align-items-center justify-content-center">
                          <button class="btn btn-dec mr-4 bg-warning p-1"><i class="ti-minus"></i></button>
                          <input type="number" class="qty-item" value="1" style="width: 35px; border: none; font-size: 1.1rem" readonly>
                          <button class="btn btn-inc bg-warning p-1"><i class="ti-plus"></i></button>
                          <button class="btn remove-item bg-danger text-light p-2 ml-3"><i class="ti-trash"></i></button>
                      </div>
                  </div> 
              </div>
            </div>
          `;
          $('.ordered-list').append(listOrder);
          // console.log(orderedList)
        }
        $('#total').html(sum());
      })
      // console.log(orderedList);

      $('#btn-bayar').on('click', function(){
        // console.log('broo')
        $.ajax({
          url: "{{ route('transaksi.store') }}",
          method: "POST",

          data: {
            "_token": "{{ csrf_token() }}",
            orderedList: orderedList,
            total: sum()
          },

          success: function(data){
            console.log(data)
            Swal.fire({
              title: data.message,
              showDenyButton: true,
              confirmButtonText: "Cetak Nota",
              denyButtonText: `Ok`
            }).then((result) => {
              if(result.isConfirmed) {
                window.open("{{ url('nota') }}/"+data.notrans)
                location.reload()
              }else if (result.isDenied) {
                location.reload()
              }
            });
            
          },
          error: function(request, status, error){
            console.log(status,error)
            Swal.fire('Pemesanan Gagal!')
          }
        });
      });

    })
    
  </script>
@endpush
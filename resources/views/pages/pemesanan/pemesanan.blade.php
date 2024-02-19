
<div class="content p-2">
    {{-- <ul class="ordered-list p-0">
        
    </ul> --}}
    <div class="row row-col-1 ordered-list p-0">
        {{-- <div class="col mb-3 bg-warning px-1" data-id="${id}">
            <div class="d-flex align-items-center justify-content-between card py-3" style="border-left: 10px solid orange;">
                <h3 class="mt-1">${nama}</h3>
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="subtotal mt-2 mr-3">${harga * 1}</h4>
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-dec mr-4 bg-warning p-1"><i class="ti-minus"></i></button>
                        <input type="number" class="qty-item" value="1" style="width: 30px; border: none; font-size: 1.3rem" readonly>
                        <button class="btn btn-inc bg-warning p-1"><i class="ti-plus"></i></button>
                    </div>
                    <button class="btn remove-item bg-danger text-light p-2 ml-3"><i class="ti-trash"></i></button>
                </div> 
            </div>
        </div> --}}
    </div>
    <div class="d-flex justify-content-between align-items-center total">
        <h3>Total</h3>
        <h4 class="count">Rp. <span id="total">0</span></h4>
    </div>
</div>
<button type="button" class="btn btn-primary mb-3" id="btn-bayar">Bayar</button>

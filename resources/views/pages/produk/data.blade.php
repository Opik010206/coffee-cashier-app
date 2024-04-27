<table class="table table-striped" id="tbl-produk_titipan">
    <thead class="table-light">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Nama Supplier</th>
        <th scope="col">Harga Beli</th>
        <th scope="col">Harga Jual</th>
        <th scope="col">Stock</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody >
        @foreach ($produk as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->nama_produk }}</td>
                <td class="py-1">{{ $c->nama_supplier }}</td>
                <td class="py-1">Rp. {{ number_format($c->harga_beli, 0, ',', '.') }}</td>
                <td class="py-1">Rp. {{ number_format($c->harga_jual, 0, ',', '.') }}</td>
                <td class="stock-cell py-1">
                    <span class="stock-value">{{ $c->stock }}</span>
                    <input type="number" class="stock-input" value="{{ $c->stock }}" data-id="{{ $c->id }}" style="width: 40px; display: none;">
                </td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama_produk="{{ $c->nama_produk }}" data-nama_supplier="{{ $c->nama_supplier }}" data-harga_beli="{{ $c->harga_beli }}" data-harga_jual="{{ $c->harga_jual }}" data-stock="{{ $c->stock }}" data-keterangan="{{ $c->keterangan }}">
                    </button>
                    <form action="produk_titipan/{{ $c->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete p-2 ti-trash">
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
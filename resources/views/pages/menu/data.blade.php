<table class="table table-striped" id="tbl-menu">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Menu</th>
        <th scope="col">Jenis</th>
        <th scope="col">Harga</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($menu as $c)
            <tr>
                <td  class="py-1">{{ $i = (!isset($i)?1:++$i) }}</td>
                <td  class="py-1">{{ $c->nama }}</td>
                <td  class="py-1">{{ $c->jenis->nama }}</td>
                <td  class="py-1">Rp. {{ number_format($c->harga, 0, ',', '.') }}</td>
                <td  class="py-1">
                    <img src="{{ asset('storage/' . $c->image) }}" class="" alt="menu image" style="width: 40px; height: 40px;">
                </td>
                <td  class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama="{{ $c->nama }}" data-harga="{{ $c->harga }}" data-image="{{ $c->image }}" data-deskripsi="{{ $c->deskripsi }}">
                    </button>
                    <form action="menu/{{ $c->id }}" method="POST" class="d-inline">
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
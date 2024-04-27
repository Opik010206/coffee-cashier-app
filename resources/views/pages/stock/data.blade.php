<table class="table table-striped" id="tbl-stock">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Menu</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($stock as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->menu->nama }}</td>
                <td class="py-1">{{ $c->jumlah }}</td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-menu_id="{{ $c->menu_id }}" data-jumlah="{{ $c->jumlah }}">
                    </button>
                    <form action="stock/{{ $c->id }}" method="POST" class="d-inline">
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
<table class="table table-striped" id="tbl-jenis">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($jenis as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->nama }}</td>
                <td class="py-1">{{ $c->kategory->nama }}</td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama="{{ $c->nama }}" data-kategory_id="{{ $c->kategory_id }}">
                    </button>
                    <form action="jenis/{{ $c->id }}" method="POST" class="d-inline">
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
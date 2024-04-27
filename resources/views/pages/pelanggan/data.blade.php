<table class="table table-striped" id="tbl-pelanggan">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">No Telp</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pelanggan as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->nama }}</td>
                <td class="py-1">{{ $c->email }}</td>
                <td class="py-1">{{ $c->no_telp }}</td>
                <td class="py-1">{{ $c->alamat }}</td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama="{{ $c->nama }}" data-email="{{ $c->email }}" data-no_telp="{{ $c->no_telp }}" data-alamat="{{ $c->alamat }}">
                    </button>
                    <form action="pelanggan/{{ $c->id }}" method="POST" class="d-inline">
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
<table class="table table-striped" id="tbl-meja">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nomor Meja</th>
        <th scope="col">Kapasitas</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        {{-- {{ dd($warna) }} --}}
        @foreach ($meja as $c)
            <tr>
                <td class="py-1">{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->no_meja }}</td>
                <td class="py-1">{{ $c->kapasitas }}</td>
                {{-- <td class="py-1"><label class="badge badge-{{ $warna[0] }}">{{ $c->status }}</label></td> --}}
                <td class="py-1">
                    @if($c->status == 'terpenuhi' || $c->status == 'Terpenuhi')
                        <label class="badge badge-success">Terpenuhi</label>
                    @else
                        <label class="badge badge-danger">Kosong</label>
                    @endif
                </td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-no_meja="{{ $c->no_meja }}" data-kapasitas="{{ $c->kapasitas }}" data-status="{{ $c->status }}">
                    </button>
                    <form action="meja/{{ $c->id }}" method="POST" class="d-inline">
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
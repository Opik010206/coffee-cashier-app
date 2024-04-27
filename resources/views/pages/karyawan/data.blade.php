<table class="table table-striped" id="tbl-karyawan">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">No Telpon</th>
        <th scope="col">Alamat</th>
        <th scope="col">Foto</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($karyawan as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->nama }}</td>
                <td class="py-1">{{ $c->jenis_kelamin }}</td>
                <td class="py-1">{{ $c->no_telp }}</td>
                <td class="py-1">{{ $c->alamat }}</td>
                <td class="py-1">
                    <img src="{{ asset('storage/' . $c->foto) }}" alt="menu foto" style="width: 40px; height: 40px;">
                </td>
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama="{{ $c->nama }}" data-jenis_kelamin="{{ $c->jenis_kelamin }}" data-no_telp="{{ $c->no_telp }}" data-alamat="{{ $c->alamat }}" data-status_nikah="{{ $c->status_nikah }}" data-agama="{{ $c->agama }}" data-tempat_lahir="{{ $c->tempat_lahir }}" data-nip="{{ $c->nip }}" data-nik="{{ $c->nik }}" data-tanggal_lahir="{{ $c->tanggal_lahir }}">
                    </button>
                    <form action="karyawan/{{ $c->id }}" method="POST" class="d-inline">
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
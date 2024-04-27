<table class="table table-striped" id="tbl-absensi">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama Karyawan</th>

        @if (Auth::check() && Auth::user()->level == 3)
        <th scope="col">Status</th>
        @endif

        <th scope="col">Tanggal Masuk</th>
        <th scope="col">Waktu Masuk</th>
        
        @if (Auth::check() && Auth::user()->level == 2)
        <th scope="col">Status</th>
        @endif

        <th scope="col">Waktu Keluar</th>

        @if (Auth::check() && Auth::user()->level == 3)
        <th scope="col">Action</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($absensi as $c)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td class="py-1">{{ $c->nama_karyawan }}</td>

                @if (Auth::check() && Auth::user()->level == 3)
                <td class="py-1">
                    @if($c->status == 'sakit')
                        <label class="badge badge-warning py-2 px-3">Sakit</label>
                    @elseif($c->status == 'cuti')
                        <label class="badge badge-secondary py-2 px-3">Cuti</label>
                    @elseif($c->status == 'masuk')
                        <label class="badge badge-info py-2 px-3">Masuk</label>
                    @else
                        <label class="badge badge-danger py-2 px-3">Alpha</label>
                    @endif
                </td>
                @endif

                <td class="py-1">{{ $c->tanggal_masuk }}</td>
                <td class="py-1">{{ $c->waktu_masuk }}</td>
                
                @if (Auth::check() && Auth::user()->level == 2)
                <td class="py-1">
                    <select class="form-control col-sm edit-status" data-id="{{ $c->id }}" name="status" id="status">
                        <option value="masuk" selected>Pilih</option>
                        <option value="masuk" {{ $c->status === 'masuk' ? 'selected' : '' }}>Masuk</option>
                        <option value="sakit" {{ $c->status === 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="cuti" {{ $c->status === 'cuti' ? 'selected' : '' }}>Cuti</option>
                    </select>
                </td>
                <td class="py-1">
                    <button class="btn btn-info py-2 btn-selesai" data-id="{{ $c->id }}">Selesai</button>    
                    <input disabled class="waktu-keluar d-none" value="{{ $c->waktu_keluar }}" name="waktu_keluar" id="waktu_keluar" style="width: 70px; border: none;">
                </td>
                @endif

                @if (Auth::check() && Auth::user()->level == 3)
                <td class="py-1">{{ $c->waktu_keluar }}</td>
                @endif

                @if (Auth::check() && Auth::user()->level == 3)
                <td class="py-1">
                    {{-- Edit --}}
                    <button type="button" class="btn btn-success mr-2 p-2 ti-pencil" data-toggle="modal" data-target="#modal" data-mode="edit" data-id="{{ $c->id }}" data-nama_karyawan="{{ $c->nama_karyawan }}" data-tanggal_masuk="{{ $c->tanggal_masuk }}" data-waktu_masuk="{{ $c->waktu_masuk }}" data-status="{{ $c->status }}" data-waktu_keluar="{{ $c->waktu_keluar }}">
                    </button>
                    <form action="absensi/{{ $c->id }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-delete p-2 ti-trash">
                        </button>
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
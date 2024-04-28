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
                <td class="py-1">{{ $c->karyawan->nama }}</td>

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

                @if($c->status == 'masuk' || $c->status == null)
                    <td class="py-1 tanggal-masuk">{{ $c->tanggal_masuk }}</td>
                @else
                    <td class="py-1">Tidak Masuk</td>
                @endif
                
                @if($c->status == 'masuk' || $c->status == null)
                    <td class="py-1 waktu-masuk">{{ $c->waktu_masuk }}</td>
                @else
                    <td class="py-1">00:00:00</td>
                @endif
                
                @if (Auth::check() && Auth::user()->level == 2)
                    <td class="py-1">
                        <select class="form-control col-sm edit-status" data-id="{{ $c->id }}" name="status" id="status">
                            <option value="masuk" selected>Pilih</option>
                            <option value="masuk" {{ $c->status === 'masuk' ? 'selected' : '' }}>Masuk</option>
                            <option value="sakit" {{ $c->status === 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="cuti" {{ $c->status === 'cuti' ? 'selected' : '' }}>Cuti</option>
                        </select>
                    </td>

                    @if($c->status == 'masuk')
                        <td class="py-1">
                            <button class="btn btn-info py-2 btn-selesai selesai-{{ $c->id }}" data-id="{{ $c->id }}">Selesai</button>
                            <input disabled class="waktu-keluar-{{ $c->id }} d-none" value="{{ $c->waktu_keluar }}" name="waktu_keluar" id="waktu_keluar" style="width: 70px; border: none;">
                        </td>
                    @elseif($c->status == null)
                        <td class="py-1"></td>
                    @else
                        <td class="py-1">00:00:00</td>
                    @endif
                @endif

                @if (Auth::check() && Auth::user()->level == 3)
                    @if($c->status == 'masuk')
                        @if ($c->waktu_keluar == null)
                            <td class="py-1 text-info">Belum Kelar</td>
                        @else
                            <td class="py-1">{{ $c->waktu_keluar }}</td>
                        @endif
                    @elseif($c->status == null)
                        <td class="py-1"></td>
                    @else
                        <td class="py-1">00:00:00</td>
                    @endif
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
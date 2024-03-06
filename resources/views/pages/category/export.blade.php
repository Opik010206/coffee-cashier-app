<table class="table table-responsive-md table-hover" id="tbl-category">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nama</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($category as $c)
            <tr>
                <th>{{ $i = (!isset($i)?1:++$i) }}</th>
                <td>{{ $c->nama }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Merek</th>
            <th>Tanggal Rilis</th>
            <th>Kondisi</th>
            <th>Kategori</th>
            <th>Ditambahkan Pada</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($data as $item)
        <tr role="row " class="odd">
            <td>{{$no++}}</td>
            <td>{{$item->nama_barang}}</td>
            <td>{{$item->merek->nama}}</td>
            <td>{{$item->tanggal_rilis}}</td>
            <td>{{$item->kondisi->nama}}</td>
            <td>{{$item->kategori->nama}}</td>
            <td>{{$item->created_at->format('d-m-Y')}}</td>
        </tr>
        @endforeach
    </tbody>
    <thead>
</table>

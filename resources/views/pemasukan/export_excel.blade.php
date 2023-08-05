<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Nominal</th>
            <th>Deskripsi</th>
            <th>Tanggal pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemasukan as $index => $pemasukans)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pemasukans->kategorimasuk->nama_kategori }}</td>
                <td>{{ 'Rp'.'.'.$pemasukans->nominal }}</td>
                <td>{{ $pemasukans->deskripsi }}</td>
                <td>{{ $pemasukans->tanggal_pemasukan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

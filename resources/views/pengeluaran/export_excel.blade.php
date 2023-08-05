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
        @foreach ($pengeluaran as $index => $pengeluarans)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pengeluarans->kategorikeluar->nama_kategori }}</td>
                <td>{{ 'Rp'.'.'.$pengeluarans->nominal }}</td>
                <td>{{ $pengeluarans->deskripsi }}</td>
                <td>{{ $pengeluarans->tanggal_pengeluaran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

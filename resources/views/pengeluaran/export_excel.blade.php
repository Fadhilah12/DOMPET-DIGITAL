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
                <td>{{ $pengeluaran->Nama Kategori }}</td>
                <td>{{ $pengeluaran->Nominal }}</td>
                <td>{{ $pengeluaran->Deskripsi }}</td>
                <td>{{ $pengeluaran->Tanggal pengeluaran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

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
                <td>{{ $pemasukan->Nama Kategori }}</td>
                <td>{{ $pemasukan->Nominal }}</td>
                <td>{{ $pemasukan->Deskripsi }}</td>
                <td>{{ $pemasukan->Tanggal pemasukan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

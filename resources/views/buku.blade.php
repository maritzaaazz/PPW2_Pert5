<style>
    /* Gaya untuk tabel */
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Gaya untuk tombol Hapus dan Edit */
    button {
        padding: 5px 10px;
        background-color: #ff6347; /* Warna merah */
        color: white;
        border: none;   
        cursor: pointer;
    }

    button:hover {
        background-color: #ff6347; /* Warna merah yang sedikit lebih gelap saat dihover */
    }

    /* Gaya untuk link "Tambah Buku" */
    a {
        text-decoration: none;
        background-color: #4caf50; /* Warna hijau */
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
    }

    a:hover {
        background-color: #45a049; /* Warna hijau yang sedikit lebih gelap saat dihover */
    }

    /* Gaya untuk teks "Jumlah data" dan "Total harga" */
    h3 {
        color: #333;
    }
</style>

<table border="1 px" class="table table-striped">
    <thead>
        <th>id</th>
        <th>Judul Buku</th>
        <th>Penulis</th>
        <th>Harga</th>
        <th>Tgl. Terbit</th>
        <th>Aksi</th>
    </thead>
    <tbody>
        @foreach ($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 2, ',', ',') }}</td>
                <td>{{ date('d/m/Y', strtotime($buku->tgl_terbit)) }}</td>
                <td>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                    </form>
                    {{-- <form action="{{ route('buku.update', $buku->id) }}" method="post">
                        @csrf --}}
                        {{-- <div>Judul <input type="text" name="judul" value="{{ $buku->judul }}"></div> --}}
                        {{-- <button onClick="return confirm('Yakin mau diedit?')">Edit</button> --}}
                        <button><a href="{{ route('buku.edit', $buku->id) }}">Edit</a></button>
                    {{-- </form> --}}

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<h3> <p>Jumlah data = {{ $jumlahData }}</p> </h3>
<h3> <p>Total harga = {{ "Rp ".$totalHarga . ",00"}}</p> </h3>

<p align="left"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>




<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <p class="text-center font-weight-bold">{{ $text }} </p>
    <div class="mt-4 mb-4">
        <table>
            <tr>
                <td><strong>Note:</strong></td>
            </tr>
            <tr>
                <td>Name </td>
                <td> : {{ $idUser->name }}</td>
            </tr>
            <tr>
                <td>Kode User</td>
                <td> : {{ $idUser->kode_user }}</td>
            </tr>
        </table>
    </div>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Maplop</th>
                <th scope="col">Kode Cabang</th>
                <th scope="col">Kode User</th>
                <th scope="col">Jenis Data</th>
                <th scope="col">Rak</th>
                <th scope="col">Created By</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_maplop }}</td>
                    <td>{{ $item->kode_cabang }}</td>
                    <td>{{ $item->kode_user }}</td>
                    <td>{{ $item->jenisData->jenis_data }}</td>
                    <td>{{ $item->rak->nama_rak }}</td>
                    <td>
                        <span class="badge badge-light">{{ $item->created_by }}</span>
                    </td>
                    <td>{{ $item->statusName->nama_status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Belajar Laravel 9</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<main style="margin-top: 70px">
    <div class="container">
        <div class="row">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="col-lg-4 mb-2">
                <form action="" method="GET" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Cari" value="{{ @$q}}">
                    </div>
                </form>
            </div>
            <div class="col-lg-8 text-end mb-2">
                <a href="{{ url('kategori/buat') }}" class="btn btn-primary">Tambah</a>
            </div>
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($result as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            <a class="btn btn-warning -btn-sm" href="{{ route('kategori.edit', $item->id)}}">Edit</a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline formDelete">
                                @csrf 
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $result->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(() => {
        $("body").on("click", ".formDelete", (el) => {
            el.preventDefault();
            Swal.fire({
                title: 'Perhatian',
                text: "Apakah anda yakin ingin menghapus data ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if(result.isConfirmed) $(el.currentTarget).submit();
            })
        })
    })
</script>
</body>
</html>
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
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <b>Perhatian</b>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ url('kategori/buat', @$kategori->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">   
                  <!--  <div class="mb-3 row">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_kategori'), @$kategori->nama_kategori }}" type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Lengkap">
                        </div>
                    </div>
                  !-->
                     <div class="mb-3 row">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-5">
                            <select name="nama_kategori" id="nama_kategori" class="form-control">
                                <option @selected(old('nama_kategori') == '') value="">- Nama Kategori Anda -</option>
                                <option @selected(old('nama_kategori', @$pelanggan->nama_kategori) == 'Celana') value="Celana">Celana</option>
                                <option @selected(old('nama_kategori', @$pelanggan->nama_kategori) == 'Baju') value="Baju">Baju</option>
                                <option @selected(old('nama_kategori', @$pelanggan->nama_kategori) == 'Outer') value="Outer">Outer</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="mb-3 row">
                        <div class="col-sm-5 offset-sm-2">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
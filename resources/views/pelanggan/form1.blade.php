<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Belajar Laravel 10</title>
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
                <form action="{{ url('pelanggan/create', @$pelanggan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">   
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nama_lengkap', @$pelanggan->nama_lengkap) }}" type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-5">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                <option @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == '') value="">- Jenis Kelamin Anda -</option>
                                <option @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'L') value="L">laki-Laki</option>
                                <option @selected(old('jenis_kelamin', @$pelanggan->jenis_kelamin) == 'P') value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nomor_hp" class="col-sm-2 col-form-label">Nomor HandPhone</label>
                        <div class="col-sm-5">
                            <input value="{{ old('nomor_hp', @$pelanggan->nomor_hp) }}" type="number" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="No Hnadphone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-5">
                            <input value="{{ old('alamat', @$pelanggan->alamat) }}" type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat Anda">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input value="{{ old('email', @$pelanggan->email) }}" type="text" class="form-control" name="email" id="email" placeholder="email">
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
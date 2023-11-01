<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title }}</title>
  {{-- Bootstrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
  <div class="container my-3">
    <div class="row">
      {{-- alert --}}
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="col-md-5">
        <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive mt-3">
              <h3>Form Tambah & Ubah Buku</h3>
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @if(Route::current()->uri == 'buku/{id}')
                  @method('PUT')
                @endif
                <div class="row">
                  <div class="col-md-12">
                    <label for="judul">Judul Buku</label>
                    {{-- input dengan kelas invalid  @error--}}
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror judul" required value="{{ isset($data['title']) ? $data['title'] : old('judul') }}">
                    {{-- pesan error --}}
                    <div class="invalid-feedback">
                      @error('judul')
                        {{ $message }}
                      @enderror
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <label for="penulis">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control penulis @error('penulis') is-invalid @enderror" required value="{{ isset($data['author']) ? $data['author'] : old('penulis') }}">
                    <div class="invalid-feedback">
                      @error('penulis')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="tahun">Tahun</label>
                    <input type="date" name="tahun" id="tahun" class="form-control tahun @error('tahun') is-invalid @enderror" required value="{{ isset($data['year']) ? $data['year'] : old('tahun') }}">
                    <div class="invalid-feedback">
                      @error('tahun')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" class="form-control penerbit @error('penerbit')is-invalid @enderror" required value="{{ isset($data['publisher']) ? $data['publisher'] : old('penerbit') }}">
                    <div class="invalid-feedback">
                      @error('penerbit')
                        {{ $message }}
                      @enderror
                    </div> 
                  </div>
                  <div class="col-md-6">
                    <label for="jumlah_halaman">Jumlah Halaman</label>
                    <input type="number" name="jumlah_halaman" id="jumlah_halaman" class="form-control jumlah_halaman @error('jumlah-halaman')is-invalid @enderror" required value="{{ isset($data['page_count']) ? $data['page_count'] : old('jumlah_halaman') }}">
                    <div class="invalid-feedback">
                      @error('jumlah_halaman')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>
                  {{-- gambar --}}
                  <div class="col-md-12">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control gambar @error('gambar') is-invalid @enderror" value="{{ isset($data['image']) ? $data['image'] : old('gambar') }}">
                    <div class="invalid-feedback">
                      @error('gambar')
                        {{ $message }}
                      @enderror
                    </div>
                  </div>
                  {{-- summary --}}
                  <div class="col-md-12">
                    <label for="sinopsis">Sinopsis</label>
                    <textarea name="sinopsis" id="sinopsis" cols="20" rows="5" class="form-control sinopsis @error('sinopsis') is-invalid @enderror">
                      @if(isset($data['summary']))
                        {{ $data['summary'] }}
                      @else
                        {{ old('sinopsis') }}
                      @endif
                    </textarea>
                  </div>

                  <div class="col-md-12 mt-3 d-flex">
                    <button type="submit" class="btn btn-primary ms-auto">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      @if(Route::current()->uri == 'buku')
      <div class="col-md-7">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive mt-3">
              <h2>Daftar Buku</h2>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($buku as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $item['title'] }}</td>
                      <td>{{ $item['author'] }}</td>
                      <td>
                        <div>
                          <a class="btn btn-sm btn-info mx-1" href="{{ url('buku/show/'. $item['id']) }}"><i class="bi bi-eye"></i></a>

                          <a class="btn btn-sm btn-warning mx-1" href="{{ url('buku/'. $item['id']) }}"><i class="bi bi-pen"></i></a>

                          <form action="{{ url('buku/'.$item['id']) }}" method="post" class="d-inline" onsubmit="return confirm('Apakah anda yakin menghapus data ini ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger mx-1" type="submit"><i class="bi bi-trash"></i></button>
                          </form>
                        </div>
                      </td>
                    </tr>

                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
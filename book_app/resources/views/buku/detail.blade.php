<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $data['title'] }}</title>
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <h3>Detail Buku</h3>
                <table class="table table-bordered">
                  <tr>
                    <th>Judul Buku</th>
                    <td>{{ $data['title'] }}</td>
                    <td rowspan="5">
                      <img src="{{ asset('upload/'.$data['image']) }}" alt="{{ $data['title'] }}" width="200">
                    </td>
                  </tr>
                  <tr>
                    <th>Penulis</th>
                    <td>{{ $data['author'] }}</td>
                  </tr>
                  <tr>
                    <th>Penerbit</th>
                    <td>{{ $data['publisher'] }}</td>
                  </tr>
                  <tr>
                    <th>Tahun Terbit</th>
                    <td>{{ $data['year'] }}</td>
                  </tr>
                  <tr>
                    <th>Sinopsis</th>
                    <td class="text-justify">{{ $data['summary'] }}</td>
                  </tr>
                </table>
                
                <div class="d-flex">
                  <a href="{{ route('buku.index') }}" class="ms-auto btn btn-primary">Kembali</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
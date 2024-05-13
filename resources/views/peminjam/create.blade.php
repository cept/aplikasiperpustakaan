<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('peminjam.store') }}" method="POST">
                        
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kontak</label>
                                <input type="text" class="form-control" name="nokontak" value="{{ old('nokontak') }}" placeholder="Kontak">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tahun</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" placeholder="Tanggal">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Buku yang Dipinjam</label>
                                <select name="id_buku" class="form-control">
                                    <option value="" disabled selected>Pilih Buku</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->judul_buku }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Jumlah Buku</label>
                                <input type="number" class="form-control" name="jumlah_buku" value="{{ old('jumlah_buku') }}" placeholder="Jumlah">
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

</script>

</body>
</html>

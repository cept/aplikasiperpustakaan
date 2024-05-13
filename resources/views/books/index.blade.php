<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center my-4">Daftar Buku</h3>      
                        <hr>
                    </div>
                    <div class="card border-0 shadow-sm rounded">
                        <div class="card-body">
                            <a href="{{ route('books.create') }}" class="btn btn-md btn-success mb-3">Tambah Buku</a>
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Cover</th>
                                    <th scope="col">Kode</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Tahun</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @forelse ($books as $book)
                                  <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/books/'.$book->cover_buku) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $book->kode_buku }}</td>
                                        <td>{{ $book->judul_buku }}</td>
                                        <td>{{ $book->kategori_buku }}</td>
                                        <td>{{ $book->stok_buku }}</td>
                                        <td>{{ $book->tahun_buku }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('books.destroy', $book->id) }}" method="POST">
                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                  @empty
                                      <div class="alert alert-danger">
                                          Data buku belum Tersedia.
                                      </div>
                                  @endforelse
                                </tbody>
                              </table>  
                              {{ $books->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
        <script>
            //message with toastr
            @if(session()->has('success'))
            
                toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
            @elseif(session()->has('error'))
    
                toastr.error('{{ session('error') }}', 'GAGAL!'); 
                
            @endif
        </script>
</body>
</html>
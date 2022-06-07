@extends('layouts/main');
@section('heading')
<h3>Nilai Pemain</h3>
@endsection
@section('content')

<!-- Create -->
<div class="card">
    <div class="card-content mx-3 my-3">
        <div class="table-responsive">
            <!-- button -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahOleh">Tambah</button>

            <!-- modal -->
            <div class="modal fade text-left" id="tambahOleh" tabindex="-1" role="dialog" aria-labelledby="tambahOlehLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="tambahOlehLabel">Tambah Oleh </h4>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/oleh/tambah" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <label>Nama: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama Oleh-Oleh" class="form-control @error('nama') is-invalid @enderror" name="nama" required>
                                        @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <label>Harga: </label>
                                    <div class="form-group">
                                        <input type="text" placeholder="ex: 5000, 10000, 20000" class="form-control @error('harga') is-invalid @enderror" name="harga" required>
                                        @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <label>Gambar:</label>
                                    <div class="form-group">
                                        <img class="img-preview img-fluid mb-3 col-sm-3">
                                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" id="gambar" name="gambar" onchange="previewGambar('')" required>
                                        @error('gambar')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <label>Deskripsi: </label>
                                    <div class="form-group">
                                        <textarea rows="3" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required></textarea>
                                        @error('deskripsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                        <i class="bx bx-x d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button class="btn btn-primary ml-1">
                                        <i class="bx bx-check d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Simpan</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if (session()->has('Success'))
            <div class="alert alert-success" role="alert">{{ session('Success') }}</div>
            @elseif (session()->has('Error'))
            <div class="alert alert-danger"role="alert">{{ session('Error') }}</div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Harga (Rp)</th>
                        <th>Terjual</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($olehs as $oleh)
                    <tr>
                        <td class="text-bold-500">{{$oleh->nama}}</td>
                        <td class="text-bold-500">{{$oleh->harga}}</td>
                        <td class="text-bold-500">{{$oleh->terjual}}</td>
                        <td>
                            <!-- View -->
                            <!-- Button -->
                            <a class="badge bg-info" data-bs-toggle="modal" data-bs-target="{{ '#view'.$oleh->id }}"><i data-feather="eye"></i></a>

                            <!-- Modal -->
                            <div class="modal fade text-left" id="{{ 'view'.$oleh->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'Label'.$oleh->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewOlehLabel">{{$oleh->nama}}</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset('storage/'.$oleh->gambar) }}" class="img-thumbnail mb-3 mx-auto d-block" width="400" height="500" alt="img">
                                            <p>
                                                {{$oleh->deskripsi}}
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Close</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- edit -->
                            <!-- button -->
                            <a class="badge bg-warning" data-bs-toggle="modal" data-bs-target="{{ '#editOleh'.$oleh->id }}"><i data-feather="edit"></i></a>
                            <!-- modal -->
                            <div class="modal fade text-left" id="{{ 'editOleh'.$oleh->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'editOlehLabel'.$oleh->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="{{ 'editOlehLabel'.$oleh->id }}">Edit</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/oleh/edit/{{ $oleh->id }}" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    <label>Nama: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Nama Oleh-Oleh" class="form-control" name="nama" value="{{$oleh->nama}}" disabled>
                                                    </div>
                                                    <label>Harga: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="ex: 5000, 10000, 20000" class="form-control" name="harga" value="{{$oleh->harga}}" required>
                                                    </div>
                                                    <label>Gambar:</label>
                                                    <div class="form-group">
                                                        <img src="{{ asset('storage/'.$oleh->gambar) }}" class="{{'img-preview'.$oleh->id}} img-fluid mb-3 col-sm-3">
                                                        <input class="form-control" type="file" id="{{'gambar'.$oleh->id}}" value="{{ asset('storage/'.$oleh->gambar) }}" name="gambar" onchange="previewGambar('{{$oleh->id}}')">
                                                    </div>
                                                    <label>Deskripsi: </label>
                                                    <div class="form-group">
                                                        <textarea rows="3" class="form-control" name="deskripsi">{{$oleh->deskripsi}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button class="btn btn-primary ml-1">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- delete -->
                            <!-- button -->
                            <a class="badge bg-danger" data-bs-toggle="modal" data-bs-target="{{ '#deleteOleh'.$oleh->id }}"><i data-feather="x-circle"></i></a>
                            <!-- modal -->
                            <div class="modal fade text-left" id="{{ 'deleteOleh'.$oleh->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'deleteOlehLabel'.$oleh->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="{{ 'deleteOlehLabel'.$oleh->id }}">Hapus</h5>
                                            <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="/oleh/delete/{{ $oleh->id }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <p>
                                                    Hapus {{$oleh->nama}}?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Iya</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function previewGambar(id) {
        const gambar = document.querySelector('#gambar'.concat(id));
        const previewGambar = document.querySelector('.img-preview'.concat(id));

        previewGambar.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(gambar.files[0]);

        ofReader.onload = function(oFREvent) {
            previewGambar.src = oFREvent.target.result;
        }
    }
</script>
@endsection
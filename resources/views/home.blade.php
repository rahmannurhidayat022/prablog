@extends('layouts.app')

@section('content')
<div id="data">
    <div class="container">
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#tambah_data">
                    <i class="far fa-plus-square"></i> Tambah Data
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($articles as $item)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->gambar }}</td>
                                <td>{{ $item->kota }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <a href="" class="btn btn-small btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-small btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_data" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Cadar Budaya</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form class="" action="{{ route('add') }}" method="POST" enctype="multiform/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama : </label>
                        <input required name="nama" name="nama" type="text" placeholder="Nama Tempat" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar : </label>
                        <input required id="gambar" name="gambar" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota : </label>
                        <textarea required id="kota" name="kota" type="kota" class="form-control" 
                            placeholder="Nama Kota"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi : </label>
                        <textarea required name="deskripsi" id="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori : </label>
                        <select name="kategori" class="form-control" id="kategori" required>
                            <option>Pilih ....</option>
                            <option value="benda">Benda</option>
                            <option value="bangunan">Bangunan</option>
                            <option value="struktur">Struktur</option>
                            <option value="situs">Situs</option>
                            <option value="kawasan">Kawasan</option>
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection

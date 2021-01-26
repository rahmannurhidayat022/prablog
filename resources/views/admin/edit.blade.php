@extends('layouts.admin')

@section('content')
    <div class="container my-3">
        <div class="card p-3">
            <div class="card-title"></div>
            <div class="card-body">
                <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                    @foreach ($article as $item)
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama : </label>
                        <input value="{{ $item->nama }}" required name="nama" type="text" placeholder="Nama Tempat" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar : </label>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <img height="200px" src="{{ asset('assets/uploads'.'/'.$item->gambar) }}" alt="{{ $item->gambar }}">
                            </div>
                            <div class="col-lg-8 col-md-6">
                                <input id="gambar" name="gambar" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota : </label>
                        <input value="{{ $item->kota }}" required id="kota" name="kota" type="kota" class="form-control" 
                            placeholder="Nama Kota">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi : </label>
                        <textarea rows="10" required name="deskripsi" id="deskripsi" class="form-control">
                            {{ $item->deskripsi }}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori : </label>
                        <select name="kategori" class="form-control" id="kategori" required>
                            <option value="{{ $item->kategori }}" selected>{{ $item->kategori }}</option>
                            <option value="benda">Benda</option>
                            <option value="bangunan">Bangunan</option>
                            <option value="struktur">Struktur</option>
                            <option value="situs">Situs</option>
                            <option value="kawasan">Kawasan</option>
                        </select>
                    </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-primary">Perbaharui Data</button>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
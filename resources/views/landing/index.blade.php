@extends('layouts.landing')

@section('content')
    <div id="articles" class="my-3">
        <div class="container">
            <div class="row">
                <div class="card bg-light p-3">
                    <div class="card-title">
                        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                            <h1 class="">
                                <span class="text-warning bg-danger fw-bold px-3">PraBlog</span> 
                                :: Informasi Cadar Budaya Indonesia</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="d-flex">
                                            <select name="filter_kategori" class="form-control">
                                                <option>Filter Kategori ....</option>
                                                <option value="benda">Benda</option>
                                                <option value="bangunan">Bangunan</option>
                                                <option value="struktur">Struktur</option>
                                                <option value="situs">Situs</option>
                                                <option value="kawasan">Kawasan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="d-flex">
                                            <input class="form-control" type="search" placeholder="Cari Cadar Budaya" aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Cadar Budaya</th>
                                            <th scope="col">Kota</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;?>
                                            @foreach ($articles as $item)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kota }}</td>
                                                <td>{{ $item->kategori }}</td>
                                                <td>
                                                    <a href="{{ url('detail/'.$item->id) }}" class="btn btn-small btn-primary">
                                                        <i class="fas fa-hand-point-right"></i> Selengkapnya
                                                    </a>
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
            </div>
        </div>
    </div>
@endsection
@extends('layouts.landing')
    
@section('content')
    <div class="container">
        @foreach ($article as $item)
        <div class="card bg-light my-3 p-0">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/uploads').'/'.$item->gambar }}" class="" alt="{{ $item->gambar }}">
                </div>
                <div class="col-lg-6 p-3">
                    <div class="card-title">
                        <h2>{{ $item->nama }}</h2>
                    </div>
                    <div class="card-body">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <i class="fas fa-tag"></i> {{ $item->kategori }}
                            </li>
                            <li class="nav-item">
                                <i class="fas fa-city"></i> {{ $item->kota }}
                            </li>
                            <li class="nav-item">
                                {{ $item->deskripsi }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
@extends('userpage.layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-body">

                    <h1 class="mb-3"><strong>{{ $berita->judul }}</strong></h1>
                    <img src="{{ asset('storage/' . $berita->foto) }}" class="img-fluid mb-4">

                    <div class="text-start">
                        {!! $berita->deskripsi !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

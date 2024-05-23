@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Periksa Ibu Hamil</h6>
            </div>

            @if (session()->has('success'))
                <div class="card-header">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <div class="card-header d-flex justify-content-between py-3 d-flex">
                <div>
                    <a href="{{ url('dashboard/periksaibuhamil/create') }}" class="btn btn-primary">Tambah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Cetak
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('cetakdataibuhamil') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cetak Data Ibu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-center">
                                            <input type="date"
                                                class="form-control @error('tanggal_awal') is-invalid @enderror"
                                                name="tanggal_awal" value="{{ old('tanggal_awal') }}" id="tanggal_awal">
                                            @error('tanggal_awal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <input type="date"
                                                class="form-control @error('tanggal_akhir') is-invalid @enderror"
                                                name="tanggal_akhir" value="{{ old('tanggal_akhir') }}" id="tanggal_akhir">
                                            @error('tanggal_awal')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover mb-3" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 15%">Nama</th>
                            <th style="width: 20%">NIK</th>
                            <th style="width: 10%">Berat Badan (kg)</th>
                            <th style="width: 20%">Umur Kehamilan (bln)</th>
                            <th style="width: 20%">Tanggal</th>
                            <th style="width: 20%">Tindakan</th>
                            <th style="width: 20%">Catatan</th>
                            <th style="width: 10%">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($periksa_ibu as $periksa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $periksa->ibu->nama }}</td>
                                <td>{{ $periksa->nik_ibu }}</td>
                                <td>{{ $periksa->berat_badan }}</td>
                                <td>{{ $periksa->umur_kehamilan }}</td>
                                <td>{{ $periksa->tanggal }}</td>
                                <td>{{ $periksa->tindakan }}</td>
                                <td>{!! Str::length($periksa->catatan) > 60 ? Str::of($periksa->catatan)->words(5, '...') : $periksa->catatan !!}</td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/periksaibuhamil/' . $periksa->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                    margin-right: 5px"><i
                                                class="far fa-edit"></i></a>

                                        <a href="{{ url('dashboard/periksaibuhamil/' . $periksa->id) }}"
                                            class="btn btn-info"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                class="fas fa-eye"></i></a>

                                        <form action="{{ url('dashboard/periksaibuhamil/' . $periksa->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn btn-danger"
                                                onclick=" return confirm('Data periksa ibu hamil akan dihapus')"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $periksa_ibu->links() }}

            </div>
        </div>
    </div>
@endsection

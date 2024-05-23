@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Penimbangan Anak</h6>
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
                    <a href="{{ url('dashboard/penimbangananak/create') }}" class="btn btn-primary">Tambah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Cetak
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('cetakdatapenimbangananak') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cetak Data Penimbangan Anak</h5>
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
                <div class="scroll mb-3">
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Kode</th>
                                <th style="width: 20%">Nama</th>
                                <th style="width: 20%">Tanggal</th>
                                <th style="width: 10%">Berat Badan (kg)</th>
                                <th style="width: 20%">Tinggi Badan (cm)</th>
                                <th style="width: 20%">Catatan</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($penimbanganAnak as $penimbangan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penimbangan->kode_anak }}</td>
                                    <td>{{ $penimbangan->nama }}</td>
                                    <td>{{ $penimbangan->tanggal }}</td>
                                    <td>{{ $penimbangan->berat_badan }}</td>
                                    <td>{{ $penimbangan->tinggi_badan }}</td>
                                    <td>{!! Str::length($penimbangan->catatan) > 60
                                        ? Str::of($penimbangan->catatan)->words(5, '...')
                                        : $penimbangan->catatan !!}</td>
                                    <td>
                                        <div class="d-flex gap-4">
                                            <a href="{{ url('dashboard/penimbangananak/' . $penimbangan->id . '/edit') }}"
                                                class="btn btn-warning"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                    margin-right: 5px"><i
                                                    class="far fa-edit"></i></a>

                                            <a href="{{ url('dashboard/penimbangananak/' . $penimbangan->id) }}"
                                                class="btn btn-info"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                    class="fas fa-eye"></i></a>

                                            <form action="{{ url('dashboard/penimbangananak/' . $penimbangan->id) }}"
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

                </div>
                {{ $penimbanganAnak->links() }}
            </div>
        </div>
    </div>
@endsection

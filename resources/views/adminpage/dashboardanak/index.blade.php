@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Anak</h6>
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
                    <a href="{{ url('dashboard/anak/create') }}" class="btn btn-primary">Tambah</a>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Cetak
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('cetakdataanak') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Cetak Data Anak</h5>
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
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nama Ibu</th>
                            <th>Tempat Lhr</th>
                            <th>Tanggal Lhr</th>
                            <th>Jenis Kelamin</th>
                            <th>Berat (kg)</th>
                            <th>Tinggi (cm)</th>
                            <th>Proses Lhr</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($anaks as $anak)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $anak->kode }}</td>
                                <td>{{ $anak->nama }}</td>
                                <td>{{ $anak->nama_ibu }}</td>
                                <td>{{ $anak->tempat_lahir }}</td>
                                <td>{{ $anak->tanggal_lahir }}</td>
                                <td>{{ $anak->jenis_kelamin }}</td>
                                <td>{{ $anak->berat_lahir }}</td>
                                <td>{{ $anak->tinggi_lahir }}</td>
                                <td>{{ $anak->proses_melahirkan }}</td>
                                <td>{{ $anak->alamat }}</td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/anak/' . $anak->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                       margin-right: 5px"><i
                                                class="far fa-edit"></i></a>

                                        <form action="{{ url('dashboard/anak/' . $anak->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn btn-danger"
                                                onclick=" return confirm('Data anak akan dihapus')"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $anaks->links() }}
            </div>
        </div>
    </div>
@endsection

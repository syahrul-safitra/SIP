@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Ibu</h6>
            </div>

            @if (session()->has('success'))
                <div class="card-header">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>z
            @endif
            <div class="card-header d-flex justify-content-between py-3 d-flex">
                <div>
                    <a href="{{ url('dashboard/ibu/create') }}" class="btn btn-primary">Tambah</a>
                    {{-- <a href="" class="btn btn-success">Cetak</a> --}}

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        Cetak
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ url('cetakdataibu') }}" method="POST">
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

                {{-- <div>
                    <input type="text" class="form-control" placeholder="Cari..." aria-label="Username"
                        aria-describedby="basic-addon1">
                </div> --}}
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover mb-3" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Suami</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($ibus as $ibu)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ibu->nama }}</td>
                                <td>{{ $ibu->nik }}</td>
                                <td>{{ $ibu->suami }}</td>
                                <td>{{ $ibu->tempat_lahir }}</td>
                                <td>{{ $ibu->tanggal_lahir }}</td>
                                <td>{{ $ibu->alamat }}</td>
                                <td>{{ $ibu->no_hp }}</td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/ibu/' . $ibu->id . '/edit') }}" class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                class="far fa-edit"></i></a>

                                        <form action="{{ url('dashboard/ibu/' . $ibu->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn btn-danger"
                                                onclick=" return confirm('Data ibu akan dihapus')"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $ibus->links() }}
            </div>
        </div>
    </div>
@endsection

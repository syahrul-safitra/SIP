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
                </div>
            @endif

            <div class="card-header d-flex justify-content-between py-3 d-flex">
                <div>
                    <a href="{{ url('dashboard/anak/create') }}" class="btn btn-primary">Tambah</a>
                    <a href="" class="btn btn-success">Cetak</a>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Cari..." aria-label="Username"
                        aria-describedby="basic-addon1">
                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Nama Ortu</th>
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
                                <td>{{ $anak->kode }}</td>
                                <td>{{ $anak->nama }}</td>
                                <td>{{ $anak->ibu->nama }}</td>
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


            </div>
        </div>
    </div>
@endsection

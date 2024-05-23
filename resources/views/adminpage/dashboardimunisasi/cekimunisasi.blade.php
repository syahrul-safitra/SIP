@extends('userpage.layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Imunisasi Tahun {{ date('Y') }}</h6>
                    </div>

                    <div class="card-header d-flex justify-content-between py-3 d-flex">
                        {{-- <div>
                            <a href="{{ url('dashboard/imunisasi/create') }}" class="btn btn-primary">Tambah</a>
                            <a href="" class="btn btn-success">Cetak</a>
                        </div> --}}
                        <form action="" method="GET">
                            <div class="d-flex justify-content-center" style="gap:15px">
                                {{-- @csrf --}}
                                <input type="text" class="form-control" name="search" placeholder="Cari..."
                                    aria-label="Username" aria-describedby="basic-addon1">

                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover mb-3" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th style="width: 20%">Nama</th>
                                    <th style="width: 10%">Kode</th>
                                    <th style="width: 20%">Tanggal</th>
                                    <th style="width: 20%">Jenis Imunisasi</th>
                                    <th style="width: 20%">Catatan</th>
                                    {{-- <th style="width: 10%">Aksi</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($imunisasis as $imunisasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $imunisasi->nama_anak }}</td>
                                        <td>{{ $imunisasi->kode_anak }}</td>
                                        <td>{{ $imunisasi->tanggal }}</td>
                                        <td>{{ $imunisasi->jenis_imunisasi }}</td>
                                        <td>{!! Str::length($imunisasi->catatan) > 60 ? Str::of($imunisasi->catatan)->words(5, '...') : $imunisasi->catatan !!}</td>
                                        {{-- <td>
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('dashboard/imunisasi/' . $imunisasi->id . '/edit') }}"
                                                    class="btn btn-warning"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                        class="far fa-edit"></i></a>

                                                <a href="{{ url('dashboard/imunisasi/' . $imunisasi->id) }}"
                                                    class="btn btn-info"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                                    margin-right: 5px"><i
                                                        class="fas fa-eye"></i></a>

                                                <form action="{{ url('dashboard/imunisasi/' . $imunisasi->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn btn-danger"
                                                        onclick=" return confirm('Data imunisasi akan dihapus')"
                                                        style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $imunisasis->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

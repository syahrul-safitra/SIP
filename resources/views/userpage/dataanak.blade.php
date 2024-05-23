@extends('userpage.layouts.main')

@section('container')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Imunisasi</h6>
                    </div>

                    {{-- <div class="card-header d-flex justify-content-between py-3 d-flex">
                    </div> --}}
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width: 10%">No</th>
                                    <th style="width: 20%">Nama</th>
                                    <th style="width: 10%">Kode</th>
                                    <th style="width: 20%">Cek Berat & Tinggi</th>
                                    {{-- <th style="width: 20%">Tinggi </th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($anaks as $anak)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $anak->kode }}</td>
                                        <td>{{ $anak->nama }}</td>
                                        <td>{{ $anak->tanggal }}
                                            <div class="d-flex justify-content-center gap-4">
                                                <a href="{{ url('dashboard/cekberatbadan/' . $anak->id) }}"
                                                    class="btn btn-info"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                        class="fas fa-eye"></i></a>
                                        </td>
                                        {{-- <td>{{ $anak->jenis_imunisasi }}
                                            <div class="d-flex justify-content-center gap-4">
                                                <a href="{{ url('dashboard/cektinggibadan/' . $anak->id) }}"
                                                    class="btn btn-warning"
                                                    style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                            margin-right: 5px"><i
                                                        class="fas fa-eye"></i></a>

                                        </td> --}}
                                        {{-- <td>{!! Str::length($anak->catatan) > 60 ? Str::of($anak->catatan)->words(5, '...') : $anak->catatan !!}</td> --}}
                                        {{-- <td>
                                            <div class="d-flex gap-4">
                                                <a href="{{ url('dashboard/anak/' . $anak->id . '/edit') }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

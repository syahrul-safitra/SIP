@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card mb-4">

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
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
                    <a href="{{ url('dashboard/berita/create') }}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
            <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($beritas as $berita)
                            <tr>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->tanggal }}</td>
                                <td>
                                    <a href="{{ asset('storage/' . $berita->foto) }}" class="btn btn-info"
                                        style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                   margin-right: 5px"><i
                                            class="fas fa-image"></i></a>

                                </td>
                                <td>
                                    <div class="d-flex gap-4">
                                        <a href="{{ url('dashboard/berita/' . $berita->id . '/edit') }}"
                                            class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px;
                                       margin-right: 5px"><i
                                                class="far fa-edit"></i></a>

                                        <form action="{{ url('dashboard/berita/' . $berita->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn btn-danger"
                                                onclick=" return confirm('Data anggota akan dihapus')"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $beritas->links() }}

            </div>
        </div>
    </div>
@endsection

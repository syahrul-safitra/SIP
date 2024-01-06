@extends('adminpage.layouts.main')

@section('container')
    <div class="table-responsive p-3">
        <table class="table table-striped align-items-center table-flush table-hover" id="dataTableHover">

            <div class="div">
                <a href="{{ url('dashboard/imunisasi') }}" class="btn btn-info  mb-3">Kembali</a>
            </div>

            <tbody>
                <tr>
                    <th scope="row" style="width: 30%">Kode Anak</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $imunisasi->kode_anak }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Nama Anak</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $imunisasi->nama_anak }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Tanggal Imunisasi</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $imunisasi->tanggal }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Jenis Imunisasi</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $imunisasi->jenis_imunisasi }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Catatan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{!! $imunisasi->catatan !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

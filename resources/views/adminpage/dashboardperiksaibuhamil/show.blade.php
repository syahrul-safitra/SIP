@extends('adminpage.layouts.main')

@section('container')
    <div class="table-responsive p-3">
        <table class="table table-striped align-items-center table-flush table-hover" id="dataTableHover">

            <div class="div">
                <a href="{{ url('dashboard/periksaibuhamil') }}" class="btn btn-info  mb-3">Kembali</a>
            </div>

            <tbody>
                <tr>
                    <th scope="row" style="width: 30%">NIK Ibu</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $periksa->nik_ibu }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Tanggal</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $periksa->tanggal }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Berat Badan (kg)</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $periksa->berat_badan }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Umur Kehamilan (bln)</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $periksa->umur_kehamilan }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Tindakan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $periksa->tindakan }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Catatan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{!! $periksa->catatan !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

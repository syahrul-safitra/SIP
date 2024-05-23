@extends('adminpage.layouts.main')

@section('container')
    <div class="table-responsive p-3">
        <table class="table table-striped align-items-center table-flush table-hover" id="dataTableHover">

            <div class="div">
                <a href="{{ url('dashboard/penimbangananak') }}" class="btn btn-info  mb-3">Kembali</a>
            </div>

            <tbody>
                <tr>
                    <th scope="row" style="width: 30%">Kode Anak</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $penimbanganAnak->kode_anak }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Nama Anak</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $penimbanganAnak->nama }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Berat Badan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $penimbanganAnak->berat_badan }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Tinggi Badan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $penimbanganAnak->tinggi_badan }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Tanggal Timbang</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{{ $penimbanganAnak->tanggal }}</td>
                </tr>

                <tr>
                    <th scope="row" style="width: 30%">Catatan</th>
                    <td style="width: 5%">:</td>
                    <td style="width: 65%">{!! $penimbanganAnak->catatan !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

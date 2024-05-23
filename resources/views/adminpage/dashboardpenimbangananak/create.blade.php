@extends('adminpage.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Periksa Penimbangan Anak</h6>
                </div>
                <form action="{{ url('dashboard/penimbangananak') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_anak">Kode Anak</label>
                                    <select class="form-control select-anak @error('kode_anak') is-invalid @enderror"
                                        id="kode_anak" name="kode_anak">
                                        @if (@old('kode_anak'))
                                            @foreach ($anaks as $anak)
                                                @if (@old('anak' === $anak->kode))
                                                    <option value="{{ $anak->kode }}" selected>{{ $anak->kode }}
                                                    </option>
                                                @else
                                                    <option value="{{ $anak->kode }}">{{ $anak->kode }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Pilih</option>
                                            @foreach ($anaks as $anak)
                                                <option value="{{ $anak->kode }}">{{ $anak->kode }}</option>
                                                <p>{{ $anak->kode }}</p>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('kode_anak')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="berat_badan">Berat (kg)</label>
                                    <input type="number" class="form-control @error('berat_badan') is-invalid @enderror"
                                        name="berat_badan" value="{{ old('berat_badan') }}" id="berat_badan"
                                        placeholder="Masukan Berat (kg)" step="any">
                                    @error('berat_badan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tinggi_badan">Tinggi (cm)</label>
                                    <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror"
                                        name="tinggi_badan" value="{{ old('tinggi_badan') }}" id="tinggi_badan"
                                        placeholder="Masukan Tinggi (cm)" step="any">
                                    @error('tinggi_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                            name="tanggal" value="{{ old('tanggal') }}" id="tanggal">
                                        @error('tanggal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="catatan" class="form-label">Catatan</label>
                                    @error('catatan')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="catatan" type="hidden" value="{{ old('catatan') }}" name="catatan"
                                        required>
                                    <trix-editor input="catatan"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label>Aksi</label>
                                    <div>
                                        <a href="{{ url('dashboard/penimbangananak') }}" class="btn btn-warning">Batal</a>
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

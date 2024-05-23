@extends('adminpage.layouts.main')

@section('container')
    <div class="col-lg-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Form Imunisasi Anak</h6>
            </div>
            <form action="{{ url('dashboard/periksaibuhamil/' . $periksa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nik_ibu">Nik ibu</label>
                                <select class="form-control select-nik-ibu @error('nik_ibu') is-invalid @enderror"
                                    id="nik_ibu" name="nik_ibu">
                                    @if (@old('nik_ibu', $periksa->nik_ibu))
                                        @foreach ($ibus as $ibu)
                                            @if (@old('nik_ibu', $periksa->nik_ibu) === $ibu->nik)
                                                <option value="{{ $ibu->nik }}" selected>{{ $ibu->nik }}
                                                </option>
                                            @else
                                                <option value="{{ $ibu->nik }}">{{ $ibu->nik }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                                @error('nik_ibu')
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
                                        name="tanggal" value="{{ old('tanggal', $periksa->tanggal) }}" id="tanggal">
                                    @error('tanggal')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="berat_badan">Berat Badan</label>
                                <input type="text" class="form-control @error('berat_badan') is-invalid @enderror"
                                    name="berat_badan" value="{{ old('berat_badan', $periksa->berat_badan) }}"
                                    id="berat_badan" placeholder="Masukan Berat Badan (kg)" step="any">
                                @error('berat_badan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="umur_kehamilan">Umur Kehamilan</label>
                                <input type="text" class="form-control @error('umur_kehamilan') is-invalid @enderror"
                                    name="umur_kehamilan" value="{{ old('umur_kehamilan', $periksa->umur_kehamilan) }}"
                                    id="umur_kehamilan" placeholder="Masukan Umur Kehamilan" step="any">
                                @error('umur_kehamilan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <input type="text" class="form-control @error('tindakan') is-invalid @enderror"
                                    name="tindakan" value="{{ old('tindakan', $periksa->tindakan) }}" id="tindakan"
                                    placeholder="Masukan Tindakan">
                                @error('tindakan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="catatan" class="form-label">Catatan</label>
                                @error('catatan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                <input id="catatan" type="hidden" value="{{ old('catatan', $periksa->catatan) }}"
                                    name="catatan" required>
                                <trix-editor input="catatan"></trix-editor>
                            </div>

                            <div class="form-group">
                                <label>Aksi</label>
                                <div>
                                    <a href="{{ url('dashboard/imunisasi') }}" class="btn btn-warning">Batal</a>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

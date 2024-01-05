@extends('adminpage.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Ibu</h6>
                </div>
                <form action="{{ url('dashboard/anak/' . $anak->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="number" class="form-control @error('kode') is-invalid @enderror"
                                        name="kode" value="{{ old('kode', $anak->kode) }}" id="kode"
                                        placeholder="Masukan Kode">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama', $anak->nama) }}" id="nama"
                                        placeholder="Masukan Nama">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ old('tempat_lahir', $anak->tempat_lahir) }}"
                                        id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <input type="date"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                            name="tanggal_lahir" value="{{ old('tanggal_lahir', $anak->tanggal_lahir) }}"
                                            id="tanggal_lahir">
                                        @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ibu">NIK Ibu</label>
                                    <select class="form-control select-ibu @error('ibu_id') is-invalid @enderror"
                                        id="ibu" name="ibu_id">
                                        @if (@old('ibu_id', $anak->ibu_id))
                                            @foreach ($ibus as $ibu)
                                                @if (@old('ibu', $anak->ibu_id) === $ibu->id)
                                                    <option value="{{ $ibu->id }}" selected>{{ $ibu->nik }}
                                                    </option>
                                                @else
                                                    <option value="{{ $ibu->id }}">{{ $ibu->nik }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Pilih</option>
                                            @foreach ($ibus as $ibu)
                                                <option value="{{ $ibu->id }}">{{ $ibu->nik }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('ibu_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="proses_melahirkan">Proses Melahirkan</label>

                                    <select class="form-control @error('proses_melahirkan') is-invalid @enderror"
                                        name="proses_melahirkan" id="proses_melahirkan">
                                        @if (@old('proses_melahirkan', $anak->proses_melahirkan))
                                            @foreach ($melahirkan as $lahir)
                                                @if (@old('proses_melahirkan', $anak->proses_melahirkan) === $lahir)
                                                    <option value="{{ $lahir }}" selected>{{ $lahir }}
                                                    </option>
                                                @else
                                                    <option value="{{ $lahir }}">{{ $lahir }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Pilih</option>
                                            <option value="normal">Normal</option>
                                            <option value="sesar">Sesar</option>
                                        @endif
                                    </select>
                                    @error('proses_melahirkan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin" id="jenis_kelamin">
                                        @if (@old('jenis_kelamin', $anak->jenis_kelamin))
                                            @foreach ($jenis_kelamin as $jk)
                                                @if (@old('jenis_kelamin', $anak->jenis_kelamin) === $jk)
                                                    <option value="{{ $jk }}" selected>{{ $jk }}
                                                    </option>
                                                @else
                                                    <option value="{{ $jk }}">{{ $jk }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            <option value="">Pilih JK</option>
                                            <option value="laki-laki">Laki-Laki</option>
                                            <option value="perempuan">Perempuan</option>
                                        @endif
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="berat_lahir">Berat (kg)</label>
                                    <input type="text" class="form-control @error('berat_lahir') is-invalid @enderror"
                                        name="berat_lahir" value="{{ old('berat_lahir', $anak->berat_lahir) }}"
                                        id="berat_lahir" placeholder="Masukan Berat (kg)">
                                    @error('berat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tinggi_lahir">Tinggi (cm)</label>
                                    <input type="number" class="form-control @error('tinggi_lahir') is-invalid @enderror"
                                        name="tinggi_lahir" value="{{ old('tinggi_lahir', $anak->tinggi_lahir) }}"
                                        id="tinggi_lahir" placeholder="Masukan Tinggi (cm)">
                                    @error('tinggi_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat', $anak->alamat) }}" id="alamat"
                                        placeholder="Masukan Alamat">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Aksi</label>
                                    <div>
                                        <a href="{{ url('dashboard/ibu') }}" class="btn btn-warning">Batal</a>
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

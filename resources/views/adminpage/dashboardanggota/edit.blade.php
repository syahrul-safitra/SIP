@extends('adminpage.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Anggota</h6>
                </div>
                <form action="{{ url('dashboard/anggota/' . $anggota->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode</label>
                                    <input type="number" class="form-control @error('kode') is-invalid @enderror"
                                        name="kode" value="{{ old('kode', $anggota->kode) }}" id="kode"
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
                                        name="nama" value="{{ old('nama', $anggota->nama) }}" id="nama"
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
                                        name="tempat_lahir" value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}"
                                        id="tempat_lahir" placeholder="Masukan Tempat Lahir">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir', $anggota->tanggal_lahir) }}"
                                        id="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
                                    @error('tanggal_lahir')
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
                                    <label for="Alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        name="alamat" value="{{ old('alamat', $anggota->alamat) }}" id="alamat"
                                        placeholder="Masukan Alamat">
                                    @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama">No Telpon</label>
                                    <input type="number" class="form-control @error('no_telpon') is-invalid @enderror"
                                        name="no_telpon" value="{{ old('no_telpon', $anggota->no_telpon) }}"
                                        id="no_telpoon" placeholder="Masukan No Telpon">
                                    @error('no_telpon')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <img src="{{ asset('storage/' . $anggota->foto) }}" alt=""
                                        class="img-preview img-fluid mb-3 col-sm-5">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" value="{{ old('foto') }}" id="foto"
                                        placeholder="Masukan Foto" accept="image/*" onchange="previewImage()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Aksi</label>
                                    <div>
                                        <a href="{{ url('dashboard/anggota') }}" class="btn btn-warning">Batal</a>
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

    <script>
        function previewImage() {

            // get object with id gambar : 
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

        }
    </script>
@endsection

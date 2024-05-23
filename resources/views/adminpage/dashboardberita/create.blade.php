@extends('adminpage.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Ibu</h6>
                </div>
                <form action="{{ url('dashboard/berita') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" id="judul"
                                        placeholder="Masukan Kode">
                                    @error('judul')
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
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    @error('deskripsi')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <input id="deskripsi" type="hidden" value="{{ old('deskripsi') }}" name="deskripsi"
                                        required>
                                    <trix-editor input="deskripsi"></trix-editor>
                                </div>

                                <div class="form-group">
                                    <label for="foto">Foto</label>

                                    <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        name="foto" value="{{ old('foto') }}" id="foto" placeholder="Masukan Foto"
                                        accept="image/*" onchange="previewImage()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label>Aksi</label>
                                    <div>
                                        <a href="{{ url('dashboard/berita') }}" class="btn btn-warning">Batal</a>
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

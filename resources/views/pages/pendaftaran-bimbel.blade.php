@extends('layouts.auth')

@section('title', 'Pendaftaran Bimbel')

@section('content')
<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
                <div class="login-brand">
                    <img src="{{ asset('assets/img/icon.png') }}" class="icon mb-3" alt="icon">
                    <p class="font-weight-bold text-primary" style="font-size:16px;">{{ env('APP_FULLNAME') }}</p>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h4>Formulir Pendaftaran Bimbel</h4>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ route('pendaftaran-bimbel.store') }}" autocomplete="off">
                            @csrf

                            <!-- Data Siswa -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">Data Siswa</h5>

                                <div class="form-group">
                                    <label for="nama_siswa" class="control-label">Nama Lengkap Siswa <span
                                            class="text-danger">*</span></label>
                                    <input id="nama_siswa" type="text"
                                        class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                                        value="{{ old('nama_siswa') }}" placeholder="ANI SUTRISNO" required tabindex="1"
                                        autofocus>
                                    @error('nama_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nik" class="control-label">NIK <span
                                            class="text-danger">*</span></label>
                                    <input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror"
                                        name="nik" value="{{ old('nik') }}" placeholder="1234567890123456" required
                                        tabindex="2">
                                    <div class="form-text">Masukkan 16 digit NIK tanpa spasi</div>
                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin <span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki"
                                                value="L" required tabindex="3" @if(old('jenis_kelamin')=='L' ) checked
                                                @endif>
                                            <label class="form-check-label" for="laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="perempuan" value="P" required tabindex="4"
                                                @if(old('jenis_kelamin')=='P' ) checked @endif>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        @error('jenis_kelamin')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir" class="control-label">Tempat Lahir <span
                                            class="text-danger">*</span></label>
                                    <input id="tempat_lahir" type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        name="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="BANDUNG"
                                        required tabindex="5">
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir" class="control-label">Tanggal Lahir <span
                                            class="text-danger">*</span></label>
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="2005-01-15"
                                        required tabindex="6">
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="agama" class="control-label">Agama <span
                                            class="text-danger">*</span></label>
                                    <select id="agama" class="form-control @error('agama') is-invalid @enderror"
                                        name="agama" required tabindex="7">
                                        <option value="" disabled @if(!old('agama')) selected @endif>-- Pilih Agama --
                                        </option>
                                        <option value="Islam" @if(old('agama')=='Islam' ) selected @endif>Islam</option>
                                        <option value="Kristen" @if(old('agama')=='Kristen' ) selected @endif>Kristen
                                        </option>
                                        <option value="Katolik" @if(old('agama')=='Katolik' ) selected @endif>Katolik
                                        </option>
                                        <option value="Hindu" @if(old('agama')=='Hindu' ) selected @endif>Hindu</option>
                                        <option value="Buddha" @if(old('agama')=='Buddha' ) selected @endif>Buddha
                                        </option>
                                        <option value="Konghucu" @if(old('agama')=='Konghucu' ) selected @endif>Konghucu
                                        </option>
                                    </select>
                                    @error('agama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="program" class="control-label">Program Bimbel <span
                                            class="text-danger">*</span></label>
                                    <select id="program" class="form-control @error('program') is-invalid @enderror"
                                        name="program" required tabindex="8">
                                        <option value="REGULER" @if(old('program', 'REGULER' )=='REGULER' ) selected
                                            @endif>Reguler</option>
                                        <option value="INTENSIF" @if(old('program')=='INTENSIF' ) selected @endif>
                                            Intensif</option>
                                        <option value="AKADEMIK" @if(old('program')=='AKADEMIK' ) selected @endif>
                                            Akademik</option>
                                        <option value="PSIKOLOGI" @if(old('program')=='PSIKOLOGI' ) selected @endif>
                                            Psikologi</option>
                                    </select>
                                    @error('program')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pengiriman" class="control-label">Pengiriman</label>
                                    <input id="pengiriman" type="text"
                                        class="form-control @error('pengiriman') is-invalid @enderror" name="pengiriman"
                                        value="{{ old('pengiriman') }}" placeholder="POLRES BANDUNG" tabindex="9">
                                    @error('pengiriman')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_telfon_siswa" class="control-label">Nomor Telepon Siswa</label>
                                    <input id="no_telfon_siswa" type="tel"
                                        class="form-control @error('no_telfon_siswa') is-invalid @enderror"
                                        name="no_telfon_siswa" value="{{ old('no_telfon_siswa') }}"
                                        placeholder="081234567890" tabindex="10">
                                    @error('no_telfon_siswa')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Data Orang Tua -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">Data Orang Tua</h5>

                                <div class="form-group">
                                    <label for="nama_ayah" class="control-label">Nama Ayah <span
                                            class="text-danger">*</span></label>
                                    <input id="nama_ayah" type="text"
                                        class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah"
                                        value="{{ old('nama_ayah') }}" placeholder="BUDI SANTOSO" required
                                        tabindex="11">
                                    @error('nama_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan_ayah" class="control-label">Pekerjaan Ayah</label>
                                    <input id="pekerjaan_ayah" type="text"
                                        class="form-control @error('pekerjaan_ayah') is-invalid @enderror"
                                        name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}"
                                        placeholder="PEGAWAI SWASTA" tabindex="12">
                                    @error('pekerjaan_ayah')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_ibu" class="control-label">Nama Ibu <span
                                            class="text-danger">*</span></label>
                                    <input id="nama_ibu" type="text"
                                        class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                                        value="{{ old('nama_ibu') }}" placeholder="SITI AMINAH" required tabindex="13">
                                    @error('nama_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan_ibu" class="control-label">Pekerjaan Ibu</label>
                                    <input id="pekerjaan_ibu" type="text"
                                        class="form-control @error('pekerjaan_ibu') is-invalid @enderror"
                                        name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="GURU"
                                        tabindex="14">
                                    @error('pekerjaan_ibu')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_telfon_orang_tua" class="control-label">Nomor Telepon Orang
                                        Tua</label>
                                    <input id="no_telfon_orang_tua" type="tel"
                                        class="form-control @error('no_telfon_orang_tua') is-invalid @enderror"
                                        name="no_telfon_orang_tua" value="{{ old('no_telfon_orang_tua') }}"
                                        placeholder="087654321098" tabindex="15">
                                    @error('no_telfon_orang_tua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="16">
                                    Kirim Pendaftaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright {{ date('Y') }} &copy; {{ env('APP_NAME') }}.
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
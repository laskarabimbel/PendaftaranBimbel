@extends('layouts.app')
@section('title', 'Edit Pendaftaran')
@section('desc', 'Dihalaman ini anda bisa edit pendaftaran siswa.')
@section('content')
<form action="{{ route('pendaftaran.update', $item->id) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama Siswa</label>
                        <div class="col-sm-9">
                            <input value="{{ old('nama_siswa', $item->nama_siswa) }}" type="text"
                                class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa"
                                id="nama_siswa" placeholder="Nama Siswa">
                            @error('nama_siswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                        <div class="col-sm-9">
                            <input value="{{ old('nik', $item->nik) }}" type="text"
                                class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik"
                                placeholder="NIK">
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                            <select name="jenis_kelamin" id="jenis_kelamin"
                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L"
                                    {{ old('jenis_kelamin', $item->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P"
                                    {{ old('jenis_kelamin', $item->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input value="{{ old('tempat_lahir', $item->tempat_lahir) }}" type="text"
                                class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                id="tempat_lahir" placeholder="Tempat Lahir">
                            @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input
                                value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($item->tanggal_lahir)->format('Y-m-d')) }}"
                                type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                name="tanggal_lahir" id="tanggal_lahir">
                            @error('tanggal_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                        <div class="col-sm-9">
                            <input value="{{ old('agama', $item->agama) }}" type="text"
                                class="form-control @error('agama') is-invalid @enderror" name="agama" id="agama"
                                placeholder="Agama">
                            @error('agama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="program" class="col-sm-3 col-form-label">Program</label>
                        <div class="col-sm-9">
                            <select name="program" id="program"
                                class="form-control @error('program') is-invalid @enderror">
                                <option value="">Pilih Program</option>
                                <option value="INTENSIF"
                                    {{ old('program', $item->program) == 'INTENSIF' ? 'selected' : '' }}>Intensif
                                </option>
                                <option value="REGULER"
                                    {{ old('program', $item->program) == 'REGULER' ? 'selected' : '' }}>Reguler</option>
                                <option value="AKADEMIK"
                                    {{ old('program', $item->program) == 'AKADEMIK' ? 'selected' : '' }}>Akademik
                                </option>
                                <option value="PSIKOLOGI"
                                    {{ old('program', $item->program) == 'PSIKOLOGI' ? 'selected' : '' }}>Psikologi
                                </option>
                            </select>
                            @error('program')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengiriman" class="col-sm-3 col-form-label">Pengiriman</label>
                        <div class="col-sm-9">
                            <input value="{{ old('pengiriman', $item->pengiriman) }}" type="text"
                                class="form-control @error('pengiriman') is-invalid @enderror" name="pengiriman"
                                id="pengiriman" placeholder="Pengiriman">
                            @error('pengiriman')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telfon_siswa" class="col-sm-3 col-form-label">No. Telp Siswa</label>
                        <div class="col-sm-9">
                            <input value="{{ old('no_telfon_siswa', $item->no_telfon_siswa) }}" type="text"
                                class="form-control @error('no_telfon_siswa') is-invalid @enderror"
                                name="no_telfon_siswa" id="no_telfon_siswa" placeholder="No. Telp Siswa">
                            @error('no_telfon_siswa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Data Orang Tua</h4>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                        <div class="col-sm-9">
                            <input value="{{ old('nama_ayah', $item->nama_ayah) }}" type="text"
                                class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah"
                                id="nama_ayah" placeholder="Nama Ayah">
                            @error('nama_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                        <div class="col-sm-9">
                            <input value="{{ old('pekerjaan_ayah', $item->pekerjaan_ayah) }}" type="text"
                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror" name="pekerjaan_ayah"
                                id="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                            @error('pekerjaan_ayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                        <div class="col-sm-9">
                            <input value="{{ old('nama_ibu', $item->nama_ibu) }}" type="text"
                                class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu"
                                id="nama_ibu" placeholder="Nama Ibu">
                            @error('nama_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                        <div class="col-sm-9">
                            <input value="{{ old('pekerjaan_ibu', $item->pekerjaan_ibu) }}" type="text"
                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror" name="pekerjaan_ibu"
                                id="pekerjaan_ibu" placeholder="Pekerjaan Ibu">
                            @error('pekerjaan_ibu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telfon_orang_tua" class="col-sm-3 col-form-label">No. Telp Ortu</label>
                        <div class="col-sm-9">
                            <input value="{{ old('no_telfon_orang_tua', $item->no_telfon_orang_tua) }}" type="text"
                                class="form-control @error('no_telfon_orang_tua') is-invalid @enderror"
                                name="no_telfon_orang_tua" id="no_telfon_orang_tua" placeholder="No. Telp Ortu">
                            @error('no_telfon_orang_tua')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
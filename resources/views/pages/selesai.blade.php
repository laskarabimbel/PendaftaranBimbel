@extends('layouts.auth')

@section('title', 'Pendaftaran Selesai')

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
                        <h4>Pendaftaran Berhasil</h4>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif

                        <p>Pendaftaran Anda telah berhasil dikirim. Kami akan segera memproses data Anda.</p>
                        <a href="{{ route('pendaftaran-bimbel.create') }}"
                            class="btn btn-primary btn-lg btn-block">Kembali ke Form Pendaftaran</a>
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
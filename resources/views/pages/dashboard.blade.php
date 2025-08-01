@extends('layouts.app')

@section('title', 'Dashboard')
@section('desc', 'Halaman Dashboard. ')

@section('content')
@can('admin')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pendaftaran Reguler</h4>
                </div>
                <div class="card-body">
                    {{ App\Models\Pendaftaran::where('program', 'REGULER')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pendaftaran Intensif</h4>
                </div>
                <div class="card-body">
                    {{ App\Models\Pendaftaran::where('program', 'INTENSIF')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pendaftaran Akademik</h4>
                </div>
                <div class="card-body">
                    {{ App\Models\Pendaftaran::where('program', 'AKADEMIK')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pendaftaran Psikologi</h4>
                </div>
                <div class="card-body">
                    {{ App\Models\Pendaftaran::where('program', 'PSIKOLOGI')->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endcan
@endsection
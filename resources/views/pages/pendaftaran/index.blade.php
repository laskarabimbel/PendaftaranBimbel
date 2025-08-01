@extends('layouts.app')
@section('title', 'Kelola Pendaftaran')
@section('desc', 'Dihalaman ini anda bisa kelola pendaftaran siswa.')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>List Pendaftaran</h4>
        <div class="card-header-action">
            <a href="{{ route('pendaftaran.create') }}" class="btn btn-primary">
                <i class="fa fa-plus"></i>
                Tambah
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped w-100" id="datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>NIK</th>
                        <th>Jenis Kelamin</th>
                        <th>Program</th>
                        <th>Agama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $(function() {
        var datatable = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: "{!! url()->current() !!}"
            },
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, 'ALL']
            ],
            responsive: true,
            order: [
                [0, 'desc'],
            ],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'nama_siswa', name: 'nama_siswa'},
                {data: 'nik', name: 'nik'},
                {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                {data: 'program', name: 'program'},
                {data: 'agama', name: 'agama'},
                {data: 'aksi', name: 'aksi'},
            ],
            columnDefs: [
                {
                    "targets": 3, // Jenis Kelamin
                    "render": function(data, type, row, meta) {
                        if(data === 'L') {
                            return `<span class="badge badge-info">Laki-laki</span>`;
                        } else {
                            return `<span class="badge badge-warning">Perempuan</span>`;
                        }
                    }
                },
                {
                    "targets": 4, // Program
                    "render": function(data, type, row, meta) {
                        let badges = {
                            'INTENSIF': 'badge-danger',
                            'REGULER': 'badge-primary',
                            'AKADEMIK': 'badge-success',
                            'PSIKOLOGI': 'badge-info'
                        };
                        return `<span class="badge ${badges[data] || 'badge-secondary'}">${data}</span>`;
                    }
                },
                {
                    "targets": -1, // Aksi
                    "render": function(data, type, row, meta) {
                        return `
                            <form action="{{ url('/pendaftaran') }}/${row.id}" method="POST" class="d-flex">
                                @method('DELETE')
                                @csrf
                                <a href="{{ url('/pendaftaran') }}/${row.id}/download" class="btn btn-sm btn-success mr-2">
                                    Download
                                </a>
                                <a
                                    href="{{ url('/pendaftaran') }}/${row.id}/edit"
                                    class="btn btn-sm btn-warning mr-2"
                                >
                                    Edit
                                </a>
                                <button
                                    type="submit"
                                    class="btn-delete btn btn-sm btn-danger"
                                >
                                    Delete
                                </button>
                            </form>
                        `;
                    }
                }
            ],
            rowId: function(a) {
                return a;
            },
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            },
        });
    });
</script>
@endpush()
@extends('layouts.app')
@push('js')
    <script>
        $(document).ready(function() {
            // edit modal
            $(`span[id^="edit-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const ruangan = $(this).attr("data-ruangan");
                const editForm = $('#editFormModalRuangan');

                $(document).find('#edit-ruangan').val(ruangan);

                editForm.attr('action', `/update-ruangan/${id}`);
            });

            // Delete Modal
            $(`span[id^="delete-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const ruangan = $(this).attr("data-ruangan");
                const deleteForm = $('#deleteFormRuangan');
                const modalBody = $('#deleteModalBody');
                modalBody.html(`Apakah anda yakin ingin menghapus ${ruangan}?`);

                $(document).find('#delete-ruangan').val(ruangan);

                deleteForm.attr('action', `/delete-ruangan/${id}`);
            });
        });
    </script>
@endpush
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <h4 class="card-title">Manajemen Pengguna</h4>
                </div>
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#tambahModalRuangan"
                        class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah
                        Data</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ruangans as $index => $ruangan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $ruangan->nama_ruangan }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalRuangan" data-id="{{ $ruangan->id }}"
                                            data-ruangan="{{ $ruangan->nama_ruangan }}" style="cursor: pointer"
                                            id="edit-{{ $ruangan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalRuangan" data-id="{{ $ruangan->id }}"
                                            data-ruangan="{{ $ruangan->nama_ruangan }}" style="cursor: pointer"
                                            id="delete-{{ $ruangan->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalRuangan" tabindex="-1" aria-labelledby="tambahModalRuangan"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalRuangan">Tambah Ruangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('ruangan.store') }}" method="POST" id="tambahFormModalRuangan">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Ruangan</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="nama_ruangan" id="edit-ruangan">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModalRuangan" tabindex="-1" aria-labelledby="editModalRuangan"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalRuangan">Edit Ruangan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalRuangan">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Ruangan</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="nama_ruangan" id="edit-ruangan">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModalRuangan">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="deleteModalBody">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <form method="post" id="deleteFormRuangan">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

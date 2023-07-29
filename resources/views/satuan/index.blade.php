@extends('layouts.app')
@push('js')
    <script>
        $(document).ready(function() {
            // edit modal
            $(`span[id^="edit-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const satuan = $(this).attr("data-satuan");
                const editForm = $('#editFormModalSatuan');

                $(document).find('#edit-satuan').val(satuan);

                editForm.attr('action', `/update-satuan/${id}`);
            });

            // Delete Modal
            $(`span[id^="delete-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const satuan = $(this).attr("data-satuan");
                const deleteForm = $('#deleteFormSatuan');
                const modalBody = $('#deleteModalBody');
                modalBody.html(`Apakah anda yakin ingin menghapus ${satuan}?`);

                $(document).find('#delete-satuan').val(satuan);

                deleteForm.attr('action', `/delete-satuan/${id}`);
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
                    <h4 class="card-title">Satuan</h4>
                </div>
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#tambahModalSatuan"
                        class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah
                        Data</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($satuans as $index => $satuan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $satuan->satuan_brg }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalSatuan" data-id="{{ $satuan->id }}"
                                            data-satuan="{{ $satuan->satuan_brg }}" style="cursor: pointer"
                                            id="edit-{{ $satuan->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalSatuan" data-id="{{ $satuan->id }}"
                                            data-satuan="{{ $satuan->satuan_brg }}" style="cursor: pointer"
                                            id="delete-{{ $satuan->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalSatuan" tabindex="-1" aria-labelledby="tambahModalSatuan"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalSatuan">Tambah Satuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('satuan.store') }}" method="POST" id="tambahFormModalSatuan">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Satuan Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="satuan_brg"
                                                        id="edit-satuan">
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
                    <div class="modal fade" id="editModalSatuan" tabindex="-1" aria-labelledby="editModalSatuan"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalSatuan">Edit Satuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalSatuan">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Satuan Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="satuan_brg"
                                                        id="edit-satuan">
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
                    <div class="modal fade" id="deleteModalSatuan">
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
                                    <form method="post" id="deleteFormSatuan">
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

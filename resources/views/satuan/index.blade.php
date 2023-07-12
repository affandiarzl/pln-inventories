@extends('layouts.app')
@push('js')
    <script>
        $(document).ready(function() {
            // edit modal
            $('#satuanId').click(function(event) {
                const id = $(this).attr("data-id");
                const satuan = $(this).attr("data-satuan");
                const editForm = $('#editFormModalSatuan');

                $(document).find('#satuan').val(satuan);

                editForm.attr('action', `/update-satuan/${id}`);
            });

            // Delete Modal
            $(document).on('show.bs.modal', '#deleteModalMobileLegends', function(event) {
                const button = $(event.relatedTarget);
                const id = button.data('id');
                const teamName = button.data('team-name');
                const modal = $(this);
                const deleteForm = $('#deleteFormMobileLegends');
                const deleteModalBody = $('#deleteModalBody');

                deleteModalBody.html(`Apakah anda yakin ingin menghapus tim ${teamName}`);
                deleteForm.attr('action', `/dashboard/admin/mobile-legends/${id}/delete`);

                modal.find('#teamName').val(teamName);

            });
        });
    </script>
@endpush
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Satuan</h4>
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
                                            data-satuan="{{ $satuan->satuan_brg }}" style="cursor: pointer" id="satuanId">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                                                        id="satuan">
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
                </div>
            </div>
        </div>
    </div>
@endsection

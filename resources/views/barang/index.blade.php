@extends('layouts.app')
@push('js')
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabelBarang').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'csv',
                        title: 'Data Barang'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Barang'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Barang'
                    },
                    {
                        extend: 'print',
                        title: 'Data Barang'
                    }
                ]
            });
        });
        $(document).ready(function() {
            // edit modal
            $(`span[id^="edit-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const idBarang = $(this).attr("data-id-arang");
                const namaBarang = $(this).attr("data-nama-barang");
                const typeBarang = $(this).attr("data-type-barang");
                const stok = $(this).attr("data-stok");
                const editForm = $('#editFormModalBarang');

                $(document).find('#id_barang').val(idBarang);
                $(document).find('#nama_barang').val(namaBarang);
                $(document).find('#type_barang').val(typeBarang);
                $(document).find('#stok').val(stok);

                editForm.attr('action', `/update-barang/${id}`);
            });

            // Delete Modal
            $(`span[id^="delete-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const barang = $(this).attr("data-barang");
                const deleteForm = $('#deleteFormBarang');
                const modalBody = $('#deleteModalBody');
                modalBody.html(`Apakah anda yakin ingin menghapus ${barang}?`);

                $(document).find('#delete-barang').val(barang);

                deleteForm.attr('action', `/delete-barang/${id}`);
            });
        });
    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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
                    <h4 class="card-title">Barang</h4>
                </div>
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#tambahModalBarang"
                        class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah
                        Data</button>
                    &nbsp;
                    <a href="#" class="btn btn-import btn-sm text-white" data-toggle="modal"
                        data-target="#importModalBarang"><i class="fas fa-upload mr-1"></i> Import
                        Data
                    </a>
                </div>
                &nbsp;
                <div class="table-responsive">
                    <table class="table table-hover" id="tabelBarang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Barang</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Tipe</th>
                                <th>Total Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $index => $barang)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $barang->id_barang }}</td>
                                    <td>{{ $barang->kategori->nama_kategori }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->type_barang }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>{{ $barang->satuan->satuan_brg }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalBarang" data-id="{{ $barang->id }}"
                                            data-id-barang="{{ $barang->id_barang }}"
                                            data-nama-barang="{{ $barang->nama_barang }}"
                                            data-type-barang="{{ $barang->type_barang }}" data-stok="{{ $barang->stok }}"
                                            style="cursor: pointer" id="edit-{{ $barang->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalBarang" data-id="{{ $barang->id }}"
                                            data-barang="{{ $barang->type_barang }}" style="cursor: pointer"
                                            id="delete-{{ $barang->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalBarang" tabindex="-1" aria-labelledby="tambahModalBarang"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalBarang">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('barang.store') }}" method="POST" id="tambahFormModalBarang">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Kategori</td>
                                                <td>
                                                    <select class="custom-select" name="id_kategori" required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih Kategori
                                                        </option>
                                                        @foreach ($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}">
                                                                {{ $kategori->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="id_barang"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="nama_barang"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tipe</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="type_barang"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Stok</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="stok"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Satuan</td>
                                                <td>
                                                    <select class="custom-select" name="id_satuan" required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih Satuan
                                                        </option>
                                                        @foreach ($satuans as $satuan)
                                                            <option value="{{ $satuan->id }}">
                                                                {{ $satuan->satuan_brg }}</option>
                                                        @endforeach
                                                    </select>
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
                    <div class="modal fade" id="editModalBarang" tabindex="-1" aria-labelledby="editModalBarang"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalBarang">Edit Barang </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalBarang">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Kategori</td>
                                                <td>
                                                    <select class="custom-select" name="id_kategori" id="id_kategori"
                                                        required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih Kategori
                                                        </option>
                                                        @foreach ($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}">
                                                                {{ $kategori->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="id_barang" id="id_barang" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Barang</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="nama_barang" id="nama_barang" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tipe</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="type_barang" id="type_barang" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total Stok</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="stok"
                                                        id="stok" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Satuan</td>
                                                <td>
                                                    <select class="custom-select" name="id_satuan" id="id_satuan"
                                                        required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih Satuan
                                                        </option>
                                                        @foreach ($satuans as $satuan)
                                                            <option value="{{ $satuan->id }}">
                                                                {{ $satuan->satuan_brg }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteModalBarang">
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
                                    <form method="post" id="deleteFormBarang">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Import Modal -->
                    <div class="modal fade" id="importModalBarang" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('barang.import') }}" method="POST" id="importFormModalBarang"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="file" name="file" required="required">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Import</button>
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

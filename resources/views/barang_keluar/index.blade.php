{{-- {{ dd($barangKeluars) }} --}}
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
                        title: 'Data Barang Keluar'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Barang Keluar'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Barang Keluar'
                    },
                    {
                        extend: 'print',
                        title: 'Data Barang Keluar'
                    }
                ]
            });
        });
        $(document).ready(function() {
            // edit modal
            $(`span[id^="edit-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const barangKeluar = $(this).attr("data-barangKeluar");
                const qtyKeluar = $(this).attr("data-qty-keluar");
                const tglKeluar = $(this).attr("data-tgl-keluar");
                const editForm = $('#editFormModalBarangKeluar');


                $(document).find('#qty_keluar').val(qtyKeluar);
                $(document).find('#tgl_keluar').val(tglKeluar);

                editForm.attr('action', `/update-barang-keluar/${id}`);
            });

            // Delete Modal
            $(`span[id^="delete-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const barangKeluar = $(this).attr("data-barangKeluar");
                const deleteForm = $('#deleteFormBarangKeluar');
                const modalBody = $('#deleteModalBody');
                modalBody.html(`Apakah anda yakin ingin menghapus ${barangKeluar}?`);

                $(document).find('#delete-barang-keluar').val(barangKeluar);

                deleteForm.attr('action', `/delete-barang-keluar/${id}`);
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
                    <h4 class="card-title">Barang Keluar</h4>
                </div>
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#tambahModalBarangKeluar"
                        class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah
                        Data</button>
                </div>
                &nbsp;
                <div class="table-responsive">
                    <table class="table table-hover" id="tabelBarang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Nama Barang</th>
                                <th>Tipe</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangKeluars as $index => $barangKeluar)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $barangKeluar->barang->kategori->nama_kategori }}</td>
                                    <td>{{ $barangKeluar->barang->nama_barang }}</td>
                                    <td>{{ $barangKeluar->barang->type_barang }}</td>
                                    <td>{{ $barangKeluar->qty_keluar }}</td>
                                    <td>{{ $barangKeluar->barang->satuan->satuan_brg }}</td>
                                    <td>{{ $barangKeluar->tgl_keluar }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalBarangKeluar" data-id="{{ $barangKeluar->id }}"
                                            data-barangKeluar="{{ $barangKeluar->barang->type_barang }}"
                                            data-qty-keluar="{{ $barangKeluar->qty_keluar }}"
                                            data-tgl-keluar="{{ $barangKeluar->tgl_keluar }}" style="cursor: pointer"
                                            id="edit-{{ $barangKeluar->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalBarangKeluar" data-id="{{ $barangKeluar->id }}"
                                            data-barangKeluar="{{ $barangKeluar->barang->type_barang }}"
                                            style="cursor: pointer" id="delete-{{ $barangKeluar->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalBarangKeluar" tabindex="-1"
                        aria-labelledby="tambahModalBarangKeluar" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalBarangKeluar">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('barang-keluar.store') }}" method="POST"
                                    id="tambahFormModalBarangKeluar">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <select class="custom-select" name="id_barang" required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih ID
                                                            Barang
                                                        </option>
                                                        @foreach ($barangs as $barang)
                                                            <option value="{{ $barang->id }}">
                                                                {{ $barang->id_barang }} - {{ $barang->nama_barang }} /
                                                                {{ $barang->type_barang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3" name="qty_keluar"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>
                                                    <input type="date" class="form-control w-100 mb-3" name="tgl_keluar"
                                                        required>
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
                    <div class="modal fade" id="editModalBarangKeluar" tabindex="-1"
                        aria-labelledby="editModalBarangKeluar" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalBarangKeluar">Edit Barang Keluar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalBarangKeluar">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <select class="custom-select" name="id_barang" required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih ID Barang
                                                        </option>
                                                        @foreach ($barangs as $barang)
                                                            <option value="{{ $barang->id }}">
                                                                {{ $barang->id_barang }} - {{ $barang->nama_barang }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jumlah</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="qty_keluar" id="qty_keluar" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>
                                                    <input type="date" class="form-control w-100 mb-3"
                                                        name="tgl_keluar" id="tgl_keluar" required>
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
                    <div class="modal fade" id="deleteModalBarangKeluar">
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
                                    <form method="post" id="deleteFormBarangKeluar">
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

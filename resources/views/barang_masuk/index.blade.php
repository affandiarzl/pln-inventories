{{-- {{ dd($barangMasuks) }} --}}
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
                        title: 'Data Barang Masuk'
                    },
                    {
                        extend: 'excelHtml5',
                        title: 'Data Barang Masuk'
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Data Barang Masuk'
                    },
                    {
                        extend: 'print',
                        title: 'Data Barang Masuk'
                    }
                ]
            });
        });
        $(document).ready(function() {
            // edit modal
            $(`span[id^="edit-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const barangMasuk = $(this).attr("data-barangMasuk");
                const qtyMasuk = $(this).attr("data-qty-masuk");
                const ruangan = $(this).attr("data-ruangan");
                const tglMasuk = $(this).attr("data-tgl-masuk");
                const editForm = $('#editFormModalBarangMasuk');


                $(document).find('#qty_masuk').val(qtyMasuk);
                $(document).find('#id_ruangan').val(ruangan);
                $(document).find('#tgl_masuk').val(tglMasuk);

                editForm.attr('action', `/update-barang-masuk/${id}`);
            });

            // Delete Modal
            $(`span[id^="delete-"]`).click(function(event) {
                const id = $(this).attr("data-id");
                const barangMasuk = $(this).attr("data-barangMasuk");
                const deleteForm = $('#deleteFormBarangMasuk');
                const modalBody = $('#deleteModalBody');
                modalBody.html(`Apakah anda yakin ingin menghapus ${barangMasuk}?`);

                $(document).find('#delete-barang-masuk').val(barangMasuk);

                deleteForm.attr('action', `/delete-barang-masuk/${id}`);
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
                    <h4 class="card-title">Barang Masuk</h4>
                </div>
                <div class="d-flex">
                    <button type="button" data-toggle="modal" data-target="#tambahModalBarangMasuk"
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
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangMasuks as $index => $barangMasuk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $barangMasuk->barang->kategori->nama_kategori }}</td>
                                    <td>{{ $barangMasuk->barang->nama_barang }}</td>
                                    <td>{{ $barangMasuk->barang->type_barang }}</td>
                                    <td>{{ $barangMasuk->qty_masuk }}</td>
                                    <td>{{ $barangMasuk->barang->satuan->satuan_brg }}</td>
                                    <td>{{ $barangMasuk->ruangan->nama_ruangan }}</td>
                                    <td>{{ $barangMasuk->tgl_masuk }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalBarangMasuk" data-id="{{ $barangMasuk->id }}"
                                            data-barangMasuk="{{ $barangMasuk->barang->type_barang }}"
                                            data-qty-masuk="{{ $barangMasuk->qty_masuk }}"
                                            data-ruangan="{{ $barangMasuk->ruangan->nama_ruangan }}"
                                            data-tgl-masuk="{{ $barangMasuk->tgl_masuk }}" style="cursor: pointer"
                                            id="edit-{{ $barangMasuk->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalBarangMasuk" data-id="{{ $barangMasuk->id }}"
                                            data-barangMasuk="{{ $barangMasuk->barang->type_barang }}"
                                            style="cursor: pointer" id="delete-{{ $barangMasuk->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalBarangMasuk" tabindex="-1"
                        aria-labelledby="tambahModalBarangMasuk" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalBarangMasuk">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('barang-masuk.store') }}" method="POST"
                                    id="tambahFormModalBarangMasuk">
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
                                                    <input type="text" class="form-control w-100 mb-3" name="qty_masuk"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ruangan</td>
                                                <td>
                                                    <select class="custom-select" name="id_ruangan">
                                                        <option selected disabled style="color:#B2B1B9">Pilih Ruangan
                                                        </option>
                                                        @foreach ($ruangans as $ruangan)
                                                            <option value="{{ $ruangan->id }}">
                                                                {{ $ruangan->nama_ruangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>
                                                    <input type="date" class="form-control w-100 mb-3" name="tgl_masuk"
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
                    <div class="modal fade" id="editModalBarangMasuk" tabindex="-1" aria-labelledby="editModalBarangMasuk"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalBarangMasuk">Edit Barang Masuk</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalBarangMasuk">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <select class="custom-select" name="id_barang" id="id_barang"
                                                        required>
                                                        <option selected disabled style="color:#B2B1B9">Pilih ID Barang
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
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="qty_masuk" id="qty_masuk" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ruangan</td>
                                                <td>
                                                    <select class="custom-select" name="id_ruangan">
                                                        <option selected disabled style="color:#B2B1B9">Pilih Ruangan
                                                        </option>
                                                        @foreach ($ruangans as $ruangan)
                                                            <option value="{{ $ruangan->id }}">
                                                                {{ $ruangan->nama_ruangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>
                                                    <input type="date" class="form-control w-100 mb-3"
                                                        name="tgl_masuk" id="tgl_masuk" required>
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
                    <div class="modal fade" id="deleteModalBarangMasuk">
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
                                    <form method="post" id="deleteFormBarangMasuk">
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

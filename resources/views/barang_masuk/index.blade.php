@extends('layouts.app')
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
                <h4 class="card-title">Barang Masuk</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" data-toggle="modal" data-target="#tambahModalBarangMasuk"
                        class="btn btn-primary btn-sm"><i class="fas fa-plus mr-1"></i> Tambah
                        Data</button>
                    &nbsp;
                    <button type="button" data-toggle="modal" data-target="#" class="btn btn-info btn-sm text-white"><i
                            class="fas fa-print mr-1"></i> Cetak
                        Data
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
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
                            @foreach ($barangMasuks as $index => $barangMasuk)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $barangMasuk->nama_kategori }}</td>
                                    <td>{{ $barangMasuk->nama_barang }}</td>
                                    <td>{{ $barangMasuk->tipe_barang }}</td>
                                    <td>{{ $barangMasuk->qty_masuk }}</td>
                                    <td>{{ $barangMasuk->satuan_brg }}</td>
                                    <td>{{ $barangMasuk->tgl_masuk }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalBarangMasuk" data-id="{{ $barangMasuk->id }}"
                                            data-barangMasuk="{{ $barangMasuk->nama_barangMasuk }}" style="cursor: pointer"
                                            id="edit-{{ $barangMasuk->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalBarangMasuk" data-id="{{ $barangMasuk->id }}"
                                            data-barangMasuk="{{ $barangMasuk->nama_barangMasuk }}" style="cursor: pointer"
                                            id="delete-{{ $barangMasuk->id }}">
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
                                                <td>Kategori</td>
                                                <td>
                                                    <select class="custom-select" name="id_kategori" required>
                                                        <option selected disabled>Pilih Kategori</option>
                                                        @foreach ($kategoris as $kategori)
                                                            <option value="{{ $kategori->id }}">
                                                                {{ $kategori->nama_kategori }}</option>
                                                        @endforeach
                                                    </select>
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
                                                    <input type="text" class="form-control w-100 mb-3" name="tipe_barang"
                                                        required>
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
                                                <td>Satuan</td>
                                                <td>
                                                    <select class="custom-select" name="id_satuan" required>
                                                        <option selected disabled>Pilih Satuan</option>
                                                        @foreach ($satuans as $satuan)
                                                            <option value="{{ $satuan->id }}">
                                                                {{ $satuan->satuan_brg }}</option>
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
                                                <td>Barang Masuk</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="nama_barangMasuk" id="edit-barangMasuk">
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

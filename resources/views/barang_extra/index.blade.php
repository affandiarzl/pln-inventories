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
                <h4 class="card-title">Barang Extrakomtabel</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" data-toggle="modal" data-target="#tambahModalBarangExtra"
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
                                <th>Ruangan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangExtras as $index => $barangExtra)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $barangExtra->nama_kategori }}</td>
                                    <td>{{ $barangExtra->nama_barang }}</td>
                                    <td>{{ $barangExtra->type_barang }}</td>
                                    <td>{{ $barangExtra->qty_masuk }}</td>
                                    <td>{{ $barangExtra->satuan_brg }}</td>
                                    <td>{{ $barangExtra->nama_ruangan }}</td>
                                    <td>{{ $barangExtra->tgl_masuk }}</td>
                                    <td>
                                        <span class="badge bg-warning shadow-sm" data-toggle="modal"
                                            data-target="#editModalBarangExtra" data-id="{{ $barangExtra->id }}"
                                            data-barangExtra="{{ $barangExtra->nama_barangExtra }}" style="cursor: pointer"
                                            id="edit-{{ $barangExtra->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                        <span class="badge bg-danger shadow-sm text-white" data-toggle="modal"
                                            data-target="#deleteModalBarangExtra" data-id="{{ $barangExtra->id }}"
                                            data-barangExtra="{{ $barangExtra->nama_barangExtra }}" style="cursor: pointer"
                                            id="delete-{{ $barangExtra->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Tambah Modal -->
                    <div class="modal fade" id="tambahModalBarangExtra" tabindex="-1"
                        aria-labelledby="tambahModalBarangExtra" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambahModalBarangExtra">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('barang-extra.store') }}" method="POST"
                                    id="tambahFormModalBarangExtra">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                            <tr>
                                                <td>ID Barang</td>
                                                <td>
                                                    <select class="custom-select" name="id_barang" required>
                                                        <option selected disabled>Pilih ID Barang</option>
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
                                                    <input type="text" class="form-control w-100 mb-3" name="qty_masuk"
                                                        required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Ruangan</td>
                                                <td>
                                                    <select class="custom-select" name="id_ruangan" required>
                                                        <option selected disabled>Pilih Ruangan</option>
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
                    <div class="modal fade" id="editModalBarangExtra" tabindex="-1" aria-labelledby="editModalBarangExtra"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalBarangExtra">Edit Barang Extra</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" id="editFormModalBarangExtra">
                                    @csrf
                                    <div class="modal-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td>Barang Extra</td>
                                                <td>
                                                    <input type="text" class="form-control w-100 mb-3"
                                                        name="nama_barangExtra" id="edit-barangExtra">
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
                    <div class="modal fade" id="deleteModalBarangExtra">
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
                                    <form method="post" id="deleteFormBarangExtra">
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

@extends('layouts.app')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Barang</h4>
                <div class="d-flex justify-content-end">
                    <button type="button" data-toggle="modal" data-target="#" class="btn btn-primary btn-sm"><i
                            class="fas fa-plus mr-1"></i> Tambah
                        Data
                    </button>
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
                                <th>ID Kategori</th>
                                <th>Kategori</th>
                                <th>Type</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>123001</td>
                                <td>Mouse</td>
                                <td>Logitech G112</td>
                                <td>12</td>
                                <td>Unit</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>113001</td>
                                <td>AC</td>
                                <td>Daikin 12-DG</td>
                                <td>4</td>
                                <td>Unit</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

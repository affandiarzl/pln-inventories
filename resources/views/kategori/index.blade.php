@extends('layouts.app')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Barang</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Kategori</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>123001</td>
                                <td>Elektronik</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>123002</td>
                                <td>Furniture</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>123003</td>
                                <td>ATK</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

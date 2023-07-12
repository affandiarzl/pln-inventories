@extends('layouts.app')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ruangan</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Ruangan</th>
                                <th>Ruangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>111001</td>
                                <td>Fasop</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>111002</td>
                                <td>KSA</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>111003</td>
                                <td>Operation</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

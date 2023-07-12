@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome Admin!</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread
                    alerts!</span></h6>
        </div>
        <div class="col-12 col-xl-4">
            <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                        <a class="dropdown-item" href="#">January - March</a>
                        <a class="dropdown-item" href="#">March - June</a>
                        <a class="dropdown-item" href="#">June - August</a>
                        <a class="dropdown-item" href="#">August - November</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
                <div class="card-people mt-auto">
                    <img src="images/dashboard/people.svg" alt="people">
                    <div class="weather-info">
                        <div class="d-flex">
                            <div>
                                <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                            </div>
                            <div class="ml-2">
                                <h4 class="location font-weight-normal">Palembang</h4>
                                <h6 class="font-weight-normal">Indonesia</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body" style="cursor: pointer">
                            <p class="mb-4">Barang Masuk</p>
                            <p class="fs-30 mb-2">57</p>
                            <p>10.00% (30 days)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                        <div class="card-body" style="cursor: pointer">
                            <p class="mb-4">Total Barang</p>
                            <p class="fs-30 mb-2">77</p>
                            <p>22.00% (30 days)</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                        <div class="card-body" style="cursor: pointer">
                            <p class="mb-4">Barang Keluar</p>
                            <p class="fs-30 mb-2">14</p>
                            <p>0.22% (30 days)</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                        <div class="card-body" style="cursor: pointer">
                            <p class="mb-4">Barang Ekstrakomtabel</p>
                            <p class="fs-30 mb-2">34</p>
                            <p>2.00% (30 days)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card position-relative">
                <div class="card-body">
                    <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                        data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                            <p class="card-title">Laporan Bulanan</p>
                                            <h1 class="text-primary">90</h1>
                                            <h3 class="font-weight-500 mb-xl-4 text-primary">Mei</h3>
                                            <p class="mb-2 mb-xl-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Quisque magna sem, consequat vel metus at, gravida pellentesque augue.
                                                Nulla ultrices porta sapien.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-9">
                                        <div class="row">
                                            <div class="col-md-6 border-right">
                                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                    <table class="table table-borderless report-table">
                                                        <tr>
                                                            <td class="text-muted">Meja</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-primary" role="progressbar"
                                                                        style="width: 70%" aria-valuenow="70"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">713</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Monitor</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                                        style="width: 30%" aria-valuenow="30"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">583</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Kursi</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: 95%" aria-valuenow="95"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">924</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Mouse</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        style="width: 60%" aria-valuenow="60"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">664</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Lemari</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-primary"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuenow="40" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">560</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Pulpen</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: 75%" aria-valuenow="75"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">793</h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <canvas id="north-america-chart"></canvas>
                                                <div id="north-america-legend"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                                        <div class="ml-xl-4 mt-3">
                                            <p class="card-title">Laporan Bulanan</p>
                                            <h1 class="text-primary">76</h1>
                                            <h3 class="font-weight-500 mb-xl-4 text-primary">Juni</h3>
                                            <p class="mb-2 mb-xl-0">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                elit. Quisque magna sem, consequat vel metus at, gravida pellentesque augue.
                                                Nulla ultrices porta sapien.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xl-9">
                                        <div class="row">
                                            <div class="col-md-6 border-right">
                                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                    <table class="table table-borderless report-table">
                                                        <tr>
                                                            <td class="text-muted">Ac</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-primary"
                                                                        role="progressbar" style="width: 70%"
                                                                        aria-valuenow="70" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">713</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Mouse</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-warning"
                                                                        role="progressbar" style="width: 30%"
                                                                        aria-valuenow="30" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">583</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Meja</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: 95%" aria-valuenow="95"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">924</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Monitor</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-info" role="progressbar"
                                                                        style="width: 60%" aria-valuenow="60"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">664</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Kursi</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-primary"
                                                                        role="progressbar" style="width: 40%"
                                                                        aria-valuenow="40" aria-valuemin="0"
                                                                        aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">560</h5>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-muted">Pulpen</td>
                                                            <td class="w-100 px-0">
                                                                <div class="progress progress-md mx-4">
                                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                                        style="width: 75%" aria-valuenow="75"
                                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <h5 class="font-weight-bold mb-0">793</h5>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <canvas id="south-america-chart"></canvas>
                                                <div id="south-america-legend"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

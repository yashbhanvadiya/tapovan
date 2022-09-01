@extends('layouts.layout')
@section('content')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                </div>
                <div class="col-7 align-self-center">
                    <div class="d-flex align-items-center justify-content-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ URL::to('/') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sales Ratio</h4>
                            <div class="sales ct-charts mt-3"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-1">Referral Earnings</h5>
                            <h3 class="font-light">$769.08</h3>
                            <div class="mt-3 text-center">
                                <div id="earnings"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Users</h4>
                            <h2 class="font-light">35,658 <span class="font-16 text-success font-medium">+23%</span>
                            </h2>
                            <div class="mt-4">
                                <div class="row text-center">
                                    <div class="col-6 border-right">
                                        <h4 class="mb-0">58%</h4>
                                        <span class="font-14 text-muted">New Users</span>
                                    </div>
                                    <div class="col-6">
                                        <h4 class="mb-0">42%</h4>
                                        <span class="font-14 text-muted">Repeat Users</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- column -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Latest Sales</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">NAME</th>
                                        <th class="border-top-0">STATUS</th>
                                        <th class="border-top-0">DATE</th>
                                        <th class="border-top-0">PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <td class="txt-oflo">Elite admin</td>
                                        <td><span class="label label-success label-rounded">SALE</span> </td>
                                        <td class="txt-oflo">April 18, 2021</td>
                                        <td><span class="font-medium">$24</span></td>
                                    </tr>
                                    <tr>

                                        <td class="txt-oflo">Real Homes WP Theme</td>
                                        <td><span class="label label-info label-rounded">EXTENDED</span></td>
                                        <td class="txt-oflo">April 19, 2021</td>
                                        <td><span class="font-medium">$1250</span></td>
                                    </tr>
                                    <tr>

                                        <td class="txt-oflo">Ample Admin</td>
                                        <td><span class="label label-purple label-rounded">Tax</span></td>
                                        <td class="txt-oflo">April 19, 2021</td>
                                        <td><span class="font-medium">$1250</span></td>
                                    </tr>
                                    <tr>

                                        <td class="txt-oflo">Medical Pro WP Theme</td>
                                        <td><span class="label label-success label-rounded">Sale</span></td>
                                        <td class="txt-oflo">April 20, 2021</td>
                                        <td><span class="font-medium">-$24</span></td>
                                    </tr>
                                    <tr>

                                        <td class="txt-oflo">Hosting press html</td>
                                        <td><span class="label label-success label-rounded">SALE</span></td>
                                        <td class="txt-oflo">April 21, 2021</td>
                                        <td><span class="font-medium">$24</span></td>
                                    </tr>
                                    <tr>

                                        <td class="txt-oflo">Digital Agency PSD</td>
                                        <td><span class="label label-danger label-rounded">Tax</span> </td>
                                        <td class="txt-oflo">April 23, 2021</td>
                                        <td><span class="font-medium">-$14</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Recent Comments</h4>
                        </div>
                        <div class="comment-widgets" style="height:430px;">
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row mt-0">
                                <div class="p-2">
                                    <img src="{{ asset('/images/user1.jpg') }}" alt="user" width="50"
                                        class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">James Anderson</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                        and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-end">April 14, 2021</span>
                                        <span class="label label-rounded label-primary">Pending</span>
                                        <span class="action-icons">
                                            <a href="javascript:void(0)">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-check"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img src="{{ asset('/images/user1.jpg') }}" alt="user" width="50"
                                        class="rounded-circle">
                                </div>
                                <div class="comment-text active w-100">
                                    <h6 class="font-medium">Michael Jorden</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                        and type setting industry. </span>
                                    <div class="comment-footer ">
                                        <span class="text-muted float-end">April 14, 2021</span>
                                        <span class="label label-success label-rounded">Approved</span>
                                        <span class="action-icons active">
                                            <a href="javascript:void(0)">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="icon-close"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart text-danger"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row">
                                <div class="p-2">
                                    <img src="{{ asset('/images/user1.jpg') }}" alt="user" width="50"
                                        class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Johnathan Doeting</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                        and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-end">April 14, 2021</span>
                                        <span class="label label-rounded label-danger">Rejected</span>
                                        <span class="action-icons">
                                            <a href="javascript:void(0)">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-check"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Comment Row -->
                            <div class="d-flex flex-row comment-row mt-0">
                                <div class="p-2">
                                    <img src="{{ asset('/images/user1.jpg') }}" alt="user" width="50"
                                        class="rounded-circle">
                                </div>
                                <div class="comment-text w-100">
                                    <h6 class="font-medium">Steve Jobs</h6>
                                    <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing
                                        and type setting industry. </span>
                                    <div class="comment-footer">
                                        <span class="text-muted float-end">April 14, 2021</span>
                                        <span class="label label-rounded label-primary">Pending</span>
                                        <span class="action-icons">
                                            <a href="javascript:void(0)">
                                                <i class="ti-pencil-alt"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-check"></i>
                                            </a>
                                            <a href="javascript:void(0)">
                                                <i class="ti-heart"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Temp Guide</h4>
                            <div class="d-flex align-items-center flex-row mt-4">
                                <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                                    <span>73<sup>°</sup></span></div>
                                <div class="ms-2">
                                    <h3 class="mb-0">Saturday</h3><small>Ahmedabad, India</small>
                                </div>
                            </div>
                            <table class="table no-border mini-table mt-3">
                                <tbody>
                                    <tr>
                                        <td class="text-muted">Wind</td>
                                        <td class="font-medium">ESE 17 mph</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Humidity</td>
                                        <td class="font-medium">83%</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Pressure</td>
                                        <td class="font-medium">28.56 in</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Cloud Cover</td>
                                        <td class="font-medium">78%</td>
                                    </tr>
                                </tbody>
                            </table>
                            <ul class="row list-style-none text-center mt-4">
                                <li class="col-3">
                                    <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                    <span class="d-block text-muted">09:30</span>
                                    <h3 class="mt-1">70<sup>°</sup></h3>
                                </li>
                                <li class="col-3">
                                    <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                                    <span class="d-block text-muted">11:30</span>
                                    <h3 class="mt-1">72<sup>°</sup></h3>
                                </li>
                                <li class="col-3">
                                    <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                                    <span class="d-block text-muted">13:30</span>
                                    <h3 class="mt-1">75<sup>°</sup></h3>
                                </li>
                                <li class="col-3">
                                    <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                                    <span class="d-block text-muted">15:30</span>
                                    <h3 class="mt-1">76<sup>°</sup></h3>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
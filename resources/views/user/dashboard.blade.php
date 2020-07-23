@extends('user.layout.access_role')
@section('title', 'Dashboard')
@section('icon', 'fa-tachometer-alt')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card text-secondary">
                    <div class="card-body">
                        <h6 class="text-primary">Total Customers</h6>
                        <h5 class="text-right">
                            <i class="fas fa-users  float-left"></i>
                            <span>
                              0
                            </span>
                        </h5>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card text-secondary">
                    <div class="card-body">
                        <h6 class="text-primary">Total Contributions</h6>
                        <h5 class="text-right">
                            <i class="fas fa-money-bill  float-left"></i>
                            <span>
                                 0
                            </span>
                        </h5>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card text-secondary">
                    <div class="card-body">
                        <h6 class="text-primary">Total revenue</h6>
                        <h5 class="text-right">
                            <i class="fas fa-coins  float-left"></i>
                            <span>
                                0
                            </span>
                        </h5>

                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card text-secondary">
                    <div class="card-body">
                        <h6 class="text-primary">Staff</h6>
                        <h5 class="text-right">
                            <i class="fas fa-user-shield  float-left"></i>
                            <span>
                                0
                            </span>
                        </h5>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Orders
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead class="trx-bg-head text-secondary py-3 px-3">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Available balance</th>
                                <th scope="col">Collected by</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody class="table-style">
                                <tr>
                                    <td colspan="7">
                                        <div class="d-flex justify-content-center flex-column align-items-center">
                                            <div class="align-items-center"><i class="fas fa-fw fa-money-bill fa-2x"></i></div>
                                            <div>No Contributions yet</div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer py-1 mt-0 mr-3 d-flex justify-content-end">
                        <a href="/orders" class="btn btn-primary btn-sm px-3">View more</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection()
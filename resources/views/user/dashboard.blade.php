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
                              {{$total_customers}}
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
                                 &#8358; {{$total_contribution}}
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
                                &#8358; {{$total_revenue}}
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
                                {{$total_staff}}
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
                        Latest transactions
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover ">
                            <thead class="trx-bg-head text-secondary py-3 px-3">
                            <tr>
                                <th scope="col">Customer ID</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Credit/Debit</th>
                                <th scope="col">Savings type</th>
                                <th scope="col">Balance</th>
                                <th scope="col">Collected by</th>
                                <th scope="col">Posted by</th>
                                <th scope="col">Date</th>
                            </tr>
                            </thead>
                            <tbody class="table-style">
                            @if(!empty($contributions) && count($contributions) > 0)
                                @foreach($contributions as $contribution)
                                    <tr>
                                        <td scope="row">{{ $contribution['customer_id'] }}</td>
                                        <td>{{ $contribution['amount'] }}</td>
                                        <td>{{ $contribution['request_type'] }}</td>
                                        <td>{{ $contribution['savings_type'] }}</td>
                                        <td>{{ $contribution['balance'] }}</td>
                                        <td>{{ $contribution['collected_by'] }}</td>
                                        <td>{{ $contribution->user['firstname'] }} {{$contribution->user['lastname']}}</td>
                                        <td>{{ $contribution['created_at']->diffForHumans() }}</td>

                                    </tr>
                                @endforeach
                                {{--    {{ $contributions->links('views.bootstrap-4') }}--}}

                            @else
                                <tr>
                                    <td colspan="7">
                                        <div class="d-flex justify-content-center">No Approved Transactions yet</div>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-footer py-1 mt-0 mr-3 d-flex justify-content-end">
                        <a href="/contributions" class="btn btn-primary btn-sm px-3">View more</a>
                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection()
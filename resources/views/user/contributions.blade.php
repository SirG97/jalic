@extends('user.layout.base')
@section('title', 'Contributions')
@section('icon', 'fa-coins')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-6">
                <div class="searchbox mt-0 mr-0">
                    <div class="form-group has-search">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control" id="search-contribution" placeholder="Search Contributions" style="border:0;">
                    </div>
                    <div class="search-result">
                        <ul class="list-group list-group-flush" id="search-result-list">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <nav class="nav nav-tabs contribution-nav mr-2">
                    <a class="nav-link contribution-active"  href="/contributions">Approved</a>
                    <a class="nav-link"  href="/unapproved">Unapproved</a>
                </nav>
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Approved Transactions
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
                            <tbody>
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
                                        <td>{{ $contribution['created_at'] }}</td>

                                    </tr>
                                    @endforeach
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

                </div>
            </div>

        </div>
    </div>
@endsection()
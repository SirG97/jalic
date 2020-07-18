@extends('user.layout.access_role')
@section('title', 'Mark Contribution')
@section('icon', 'fa-user-plus')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Mark Contribution
                    </div>
                    <form action="/contribute" method="POST">
                        <div class="container">
                            <div class="row cool-border trx-bg-head py-3">
                                <div class="col-md-8 offset-md-2">
                                    @include('includes\message')
                                    <div class="form-row">
                                        <input type="hidden" id="token" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                        <div class="col-md-6 mb-3">
                                            <label for="customer_id">Customer ID</label>
                                            <input type="text" class="form-control" id="customer_id" name="customer_id" value="{{ \App\Classes\Request::old('post', 'customer_id') }}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Customer Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="Ayo" readonly>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="collected_by">Collected by</label>
                                            <input type="text" class="form-control" id="collected_by" name="collected_by" value="{{ \App\Classes\Request::old('post', 'collected_by') }}" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="posted_by">Posted by</label>
                                            <select class="custom-select" id="posted_by" name="posted_by" required>
                                                <option value="{{ \App\Classes\Request::old('post', 'posted_by') }}">
                                                    {{ \App\Classes\Request::old('post', 'posted_by') ? : ""}}
                                                </option>
                                                <option value="sameday">Same day delivery</option>
                                                <option value="nextday">Next day delivery</option>
                                                <option value="twoday">Two day delivery</option>
                                                <option value="premium">Premium service</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="email">Amount</label>
                                            <input type="text" class="form-control" id="amount" name="amount" value="{{ \App\Classes\Request::old('post', 'amount') }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="d-block">Request type</label><br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="request_type_d" name="request_type" class="custom-control-input">
                                                <label class="custom-control-label" for="request_type_d">Debit</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="request_type" name="request_type" class="custom-control-input">
                                                <label class="custom-control-label" for="request_type">Credit</label>
                                            </div>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="s-block">Savings type</label><br>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="savings_type_s" name="savings_type" class="custom-control-input">
                                                <label class="custom-control-label" for="savings_type_s">Savings</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="savings_type_l" name="savings_type" class="custom-control-input">
                                                <label class="custom-control-label" for="savings_type_l">Loan</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="savings_type_p" name="savings_type" class="custom-control-input">
                                                <label class="custom-control-label" for="savings_type_p">Property</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label for="id">Date collected</label>
                                            <input type="date" class="form-control" name="collected_on" value="{{ \App\Classes\Request::old('post', 'collected_on') }}" id="collected_on">
                                        </div>
                                        <div class="col-md-7 mb-3">
                                            <label for="description">Description</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="description" value="{{ \App\Classes\Request::old('post', 'description') }}" id="description"  class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer py-2 mt-2 mr-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm px-3">Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection()
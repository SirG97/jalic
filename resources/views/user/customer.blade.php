@extends('user.layout.access_role')
@section('title', 'Order')
@section('icon', 'fa-user-plus')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                       Add new customer
                    </div>
                    <form action="/new_customer" method="POST">
                    <div class="container">
                        <div class="row cool-border trx-bg-head py-3">
                            <div class="col-md-10 offset-md-1">
                                @include('includes.message')
                                <h6 class="text-primary">Biodata</h6>
                                    <div class="form-row">
                                        <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                        <div class="col-md-2 mb-3">
                                            <label for="title">Title</label>
                                            <select name="title" id="title" class="custom-select">
                                                <option value="{{ \App\Classes\Request::old('post', 'title') }}">
                                                    {{ \App\Classes\Request::old('post', 'title') ? : "Title"}}
                                                </option>
                                                <option value="Mr">Mr</option>
                                                <option value="Mrs">Mrs</option>
                                                <option value="Miss">Miss</option>
                                                <option value="Master">Master</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="marital_status">Marital Status</label>
                                            <select id="marital_status" name="marital_status" class="custom-select">
                                                <option value="{{ \App\Classes\Request::old('post', 'marital_status') }}">
                                                    {{ \App\Classes\Request::old('post', 'marital_status') ? : "Marital Status"}}
                                                </option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="divorced">Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="dob">Date of Birth</label>
                                            <input type="date" class="form-control" id="dob" name="dob" id="dob" required>

                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="occupation">Occupation</label>
                                            <input type="text" class="form-control" name="occupation" id="occupation" required>

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control"  name="email" id="email" >

                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control"  name="phone" id="phone" required>

                                        </div>

                                        <div class="col-md-2 mb-3">
                                            <label for="sex">Sex</label>
                                            <select name="sex" id="sex" class="custom-select">
                                                <option value="{{ \App\Classes\Request::old('post', 'sex') }}">
                                                    {{ \App\Classes\Request::old('post', 'sex') ? : "Sex"}}
                                                </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-7 mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" name="address" value="" id="address" class="form-control">
                                        </div>

                                        <div class="col-md-5 mb-3">
                                            <label for="office">Shop/store office</label>
                                            <input type="text" class="form-control"  name="office" id="office" required>
                                        </div>
                                    </div>
                                <h6 class="text-primary">Savings plan</h6>
                                    <div class="form-row">
                                    <div class="col-md-3 mb-3">
                                        <label for="saving_period">Savings Period</label>
                                        <input type="text" name="saving_period" value="" id="saving_period" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="amount">Daily savings</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">&#8358</span>
                                            </div>
                                            <input type="text" name="amount" value="500"  class="form-control" aria-label="Amount (to the nearest dollar)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="purpose">Purpose</label>
                                        <input type="text" name="purpose" value="" id="purpose" class="form-control">
                                    </div>
                                </div>
                                <h6 class="text-primary">Next of Kin</h6>
                                    <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="kin_name">Name</label>
                                        <input type="text" class="form-control" id="kin_name" name="kin_name" value="" required>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="kin_address">Address</label>
                                        <input type="text" class="form-control" id="kin_address" name="kin_address" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="kin_phone">Phone</label>
                                        <input type="text" class="form-control" id="kin_phone" name="kin_phone" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="kin_relationship">Relationship</label>
                                        <select name="kin_relationship" id="kin_relationship" class="custom-select">
                                            <option value="{{ \App\Classes\Request::old('post', 'kin_relationship') }}">
                                                {{ \App\Classes\Request::old('post', 'kin_relationship') ? : ""}}
                                            </option>
                                            <option value="spouse">Spouse</option>
                                            <option value="father">Father</option>
                                            <option value="mother">Mother</option>
                                            <option value="uncle">Uncle</option>
                                            <option value="aunt">Aunt</option>
                                            <option value="brother">Brother</option>
                                            <option value="sister">Sister</option>
                                            <option value="son">Son</option>
                                            <option value="daughter">Daughter</option>
                                        </select>
                                    </div>
                                </div>
                                <h6 class="text-primary">Account details</h6>
                                    <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="account_name">Account Name</label>
                                        <input type="text" class="form-control" id="account_name" name="account_name" value="" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="account_number">Account number</label>
                                        <input type="text" class="form-control" id="account_number" name="account_number" required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="bank">Bank</label>
                                        <input type="text" class="form-control" id="bank" name="bank" required>
                                    </div>

                                    </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" required>
                                                <label class="form-check-label" for="invalidCheck3">
                                                    Agree to terms and conditions
                                                </label>
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

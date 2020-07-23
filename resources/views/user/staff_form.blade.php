@extends('user.layout.access_role')
@section('title', 'New Staff')
@section('icon', 'fa-user-plus')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Add new staff
                    </div>
                    <form action="/staff/add" method="POST" enctype="multipart/form-data">
                        <div class="container">
                            <div class="row cool-border trx-bg-head py-3">
                                <div class="col-md-8 offset-md-2">
                                    @include('includes.message')
                                    <div class="form-row">
                                        <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                        <div class="col-md-4 mb-3">
                                            <label for="firstname">First name</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="lastname">Last name</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="email">Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                                </div>
                                                <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend3" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-5 mb-3">
                                            <label for="phone">Phone number</label>
                                            <input type="text" class="form-control"  name="phone" id="phone" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="city">Branch</label>
                                            <input type="text" class="form-control" name="branch" id="branch" required>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="state">Unit manager</label>
                                            <input type="text" class="form-control" name="unit_manager" id="unit_manager" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="amount">Password</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="password" value="" id="password" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label for="admin_right">Priviledge</label>
                                            <select class="custom-select" id="admin_right" name="admin_right" required>
                                                <option selected value="Admin">Admin</option>
                                                <option value="Staff">Staff</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control"  name="address" id="address" required>
                                        </div>
                                    </div>

                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <label for="job_title">Job title</label>
                                            <input type="text" class="form-control"  name="job_title" id="job_title" required>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="job_description">Job Description</label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="job_description" value="" id="job_description"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-4 ">

                                            <label class="custom-file-label" for="profile_pics">Profile picture</label>
                                            <div class="input-group custom-file">
                                                <input type="file" name="profile_pics" class="custom-file-input" id="profile_pics">
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

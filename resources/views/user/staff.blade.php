
@extends('user.layout.access_role')
@section('title', 'Staff Detail')
@section('icon', 'fa-user-plus')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Staff details
                    </div>
                        <div class="container">
                            <div class="row trx-bg-head py-3">
                                <div class="col-md-8 offset-md-2">
                                    @include('includes.message')

                                    @if(!empty($profile))

                                        <div class="col-md-12 mb-3 d-flex align-items-center flex-column justify-content-center" style="height: inherit">
                                            <div class="profile-img my-auto">
                                                <img class=" rounded-circle img-thumbnail img-fluid" src="/{{$profile->image}}" alt="profile pics">
                                            </div>
                                        </div>
                                        <div class="basic-section">
                                            <h3 class="text-center">{{$profile->firstname}} {{$profile->lastname}}</h3>
                                            <h6 class="text-center text-primary">{{$profile->admin_right}}</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card  order-card text-secondary">
                                                <div class="card-body">
                                                    <div class="full-details d-flex flex-column px-3">
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Job title</div>
                                                                <div class="col-sm-8"> {{$profile->job_title}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Job description:</div>
                                                                <div class="col-sm-8"> {{$profile->job_description}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Email:</div>
                                                                <div class="col-sm-8">
                                                                    {{$profile->email}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Phone:</div>
                                                                <div class="col-sm-8">
                                                                    {{$profile->phone}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Branch:</div>
                                                                <div class="col-sm-8">{{$profile->branch}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Unit manager:</div>
                                                                <div class="col-sm-8">{{$profile->unit_manager}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="full-details-item">
                                                            <div class="d-flex row my-2">
                                                                <div class="col-sm-4 order-detail-title">Address:</div>
                                                                <div class="col-sm-8">{{$profile->address}}</div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
@endsection()

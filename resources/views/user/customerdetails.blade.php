@extends('user.layout.access_role')
@section('title', 'Order')
@section('icon', 'fa-user-plus')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card ">
                    <div class="d-flex justify-content-between py-2 px-3">
                        <div class="text-secondary mb-1">

                            <div class="order-name">{{$customer->name}}</div>

                        </div>
                        <div class="font-weight-bold text-secondary mb-1 d-flex justify-content-end">
                            <div class="text-right">
                                Order ID: {{$customer->customer_id}}
                            </div>

                        </div>
                    </div>
                    <div class="order-details-container cool-border-top">
                        <div class="order-details d-flex flex-column flex-sm-row py-3">
                            <div class="order-detail px-2">
                                <div class="order-detail-title mt-1">Name</div>
                                <div>{{$customer->name}}</div>
                            </div>
                            <div class="order-detail px-2">
                                <div class="order-detail-title mt-1">Address:</div>
                                <div>{{$customer->address}}</div>
                            </div>
                            <div class="order-detail px-2">
                                <div class="order-detail-title mt-1">Phone:</div>
                                <div>{{$customer->phone}}</div>
                            </div>
                            <div class="order-detail px-2">
                                <div class="order-detail-title mt-1">Email:</div>
                                <div>e{{$customer->email}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row ">
            <div class="col-md-7">
                <div class="custom-panel card pt-2">
                    <div class="font-weight-bold text-secondary  py-3 px-3 cool-border-bottom">Customer details
                    </div>
                    <div class="full-details d-flex flex-column px-3">
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Profile :</div>
                                <div class="col-sm-8">
                                    <img src="/" >
                                </div>
                            </div>
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Marital status:</div>
                                <div class="col-sm-8">
                                    {{$customer->marital_status}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Dat of Birth</div>
                                <div class="col-sm-8"> {{$customer->dob}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Sex:</div>
                                <div class="col-sm-8"> {{$customer->sex}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Occupation:</div>
                                <div class="col-sm-8">
                                    {{$customer->occupation}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Address:</div>
                                <div class="col-sm-8">
                                    {{$customer->address}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Shop/Store/Office:</div>
                                <div class="col-sm-8"> {{$customer->office}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Savings plan:</div>
                                <div class="col-sm-8">{{$customer->saving_period}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Daily savings:</div>
                                <div class="col-sm-8">{{$customer->amount}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Purpose:</div>
                                <div class="col-sm-8"> {{$customer->purpose}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Account name:</div>
                                <div class="col-sm-8"> {{$customer->account_name}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Account number:</div>
                                <div class="col-sm-8"> {{$customer->account_name}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Bank:</div>
                                <div class="col-sm-8"> {{$customer->bank}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Next of Kin name:</div>
                                <div class="col-sm-8">{{$customer->kin_name}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Next of Kin phone:</div>
                                <div class="col-sm-8"> {{$customer->kin_phone}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Next of Kin address:</div>
                                <div class="col-sm-8"> {{$customer->kin_address}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Relationship:</div>
                                <div class="col-sm-8">{{$customer->kin_relationship}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-sm-4 order-detail-title">Registered by:</div>
                                <div class="col-sm-8"> sproea</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="custom-panel card pt-2">
                    <div class="font-weight-bold text-secondary py-3 px-3 cool-border-bottom">
                        Order Timeline
                    </div>
                    <div class="full-details">
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Registered</h6>
                                    <small>3 days ago</small>
                                </div>
                                <p class="mb-1 font-weight-normal">Donec id elit non mi porta gravida at eget metus. </p>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Ongoing</h6>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida.</p>

                            </a>
                            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Delivered</h6>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget </p>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

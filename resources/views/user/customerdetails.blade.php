@extends('user.layout.access_role')
@section('title', 'Customer')
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
            <div class="col-md-4">
                <div class="custom-panel card pt-2">
                    <div class="font-weight-bold text-secondary  py-3 px-3 cool-border-bottom">Customer details
                    </div>
                    <div class="full-details d-flex flex-column px-3">
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Marital status:</div>
                                <div class="col-7">
                                    {{$customer->marital_status}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Dat of Birth</div>
                                <div class="col-7"> {{$customer->dob}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Sex:</div>
                                <div class="col-7"> {{$customer->sex}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Occupation:</div>
                                <div class="col-7">
                                    {{$customer->occupation}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Address:</div>
                                <div class="col-7">
                                    {{$customer->address}}
                                </div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Shop/Store/Office:</div>
                                <div class="col-7"> {{$customer->office}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Savings plan:</div>
                                <div class="col-7">{{$customer->saving_period}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Daily savings:</div>
                                <div class="col-7">{{$customer->amount}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Purpose:</div>
                                <div class="col-7"> {{$customer->purpose}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Account name:</div>
                                <div class="col-7"> {{$customer->account_name}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Account number:</div>
                                <div class="col-7"> {{$customer->account_number}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Bank:</div>
                                <div class="col-7"> {{$customer->bank}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Next of Kin name:</div>
                                <div class="col-7">{{$customer->kin_name}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Next of Kin phone:</div>
                                <div class="col-7"> {{$customer->kin_phone}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Next of Kin address:</div>
                                <div class="col-7"> {{$customer->kin_address}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Relationship:</div>
                                <div class="col-7">{{$customer->kin_relationship}}</div>
                            </div>
                        </div>
                        <div class="full-details-item">
                            <div class="d-flex row my-1">
                                <div class="col-5 order-detail-title">Registered by:</div>
                                <div class="col-7"> sproea</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="custom-panel card py-2" >
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Customer contributions
                    </div>
                    <div class="row cool-border-top ">
                        <div class="col-md-12">
                            <div class="d-flex flex-column p-3 contribution-overview">
                                <div class="d-flex justify-content-between">
                                    <div class=""><h6>Total Contribution</h6></div>
                                    <div class=""><h6>{{$total}}</h6></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class=""><h6>Total Withdrawal</h6></div>
                                    <div class=""><h6>{{$withdrawn}}</h6></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class=""><h6>Balance</h6></div>
                                    <div class=""><h6>{{$balance}}</h6></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class=""><h6>Loan</h6></div>
                                    <div class=""><h6>{{$loan}}</h6></div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class=""><h6>Service Charge</h6></div>
                                    <div class=""><h6>{{$service_charge}}</h6></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            @if(!empty($contributions) && count($contributions) > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead class="trx-bg-head text-secondary py-3 px-3">
                                        <tr>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Credit/Debit</th>
                                            <th scope="col">Savings type</th>
                                            <th scope="col">Posted by</th>
                                            <th scope="col">Approved by</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-style">
                                        @foreach($contributions as $contribution)
                                            <tr>
                                                <td scope="row">{{ $contribution['amount'] }}</td>
                                                <td>{{ $contribution['request_type'] }}</td>
                                                <td>{{ $contribution['savings_type'] }}</td>
                                                <td>{{ $contribution->user['firstname'] }} {{$contribution->user['lastname']}}</td>
                                                <td>{{ $contribution['approved_by'] }}</td>
                                                <td>{{ $contribution['created_at']->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-hover ">
                                                <thead class="trx-bg-head text-secondary py-3 px-3">
                                                <tr>
                                                    <th scope="col">Pin</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Daily Amount</th>
                                                    <th scope="col">Balance</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                                </thead>
                                                <tbody class="table-style">
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="d-flex justify-content-center">No cotributions yet</div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            @endif

                                        </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()

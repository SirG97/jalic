
@extends('user.layout.access_role')
@section('title', 'Message')
@section('icon', 'fa-envelope')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12">
                <div class="custom-panel card py-2">
                    <div class="font-weight-bold text-secondary mb-1 py-3 px-3">
                        Message
                    </div>
                    <div class="container">
                        <div class="row trx-bg-head py-3" style="border-top: 1px solid #e3e8ee; border-bottom: 1px solid #e3e8ee">
                            <div class="col-md-4 offset-md-3">
                                <div class="form-group">
                                    <label for="numbers" class="">Customer ID</label>
                                    <input type="text" class="form-control" value="" id="customer_id" name="customer_id">
                                </div>
                                <div class="form-group">
                                    <label for="numbers" class="">Name</label>
                                    <input type="text" class="form-control" value="" id="name" name="name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="numbers" class="">Number</label>
                                    <input type="text" class="form-control" value="" id="numbers" name="number">
                                </div>

                                <div class="form-group">
                                    <label for="message" class="">Message</label>
                                    <textarea class="form-control" id="message" name="messsage"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer py-2 mt-2 mr-3 d-flex justify-content-end">
                        <div class="btn btn-primary btn-sm px-3">Send</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection()
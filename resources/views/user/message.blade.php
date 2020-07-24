
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
                    <form action="/sendsms" method="POST">
                        <div class="container">

                            @include('includes.message')
                            <div class="row trx-bg-head py-3" style="border-top: 1px solid #e3e8ee; border-bottom: 1px solid #e3e8ee">
                                <div class="col-md-4 offset-md-3">
                                    <input type="hidden" name="token" value="{{\App\Classes\CSRFToken::_token()}}">
                                    <div class="form-group class">
                                        <label for="numbers" class="">Name</label>
                                        <input type="text" class="form-control" value="" id="searchname" name="name">
                                        <div class="searchname-result">
                                            <ul class="list-group list-group-flush" id="search-result-list">

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numbers" class="">Number</label>
                                        <input type="text" class="form-control" value="" id="number" name="number">
                                    </div>

                                    <div class="form-group">
                                        <label for="message" class="">Message</label>
                                        <textarea class="form-control" id="message" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer py-2 mt-2 mr-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm px-3">Send</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection()
@extends('layouts.layout')
@section('header')
 <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
 <script src="/assets/js/email_validate.js"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Request Pendding</div>
                <div class="panel-body" style="height: 300px; text-align: center;padding: 50px;">
                    <h3 style="font-family: tahoma;">Plz , wait whlie Admin approve your request .</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

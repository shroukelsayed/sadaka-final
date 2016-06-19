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
                    <h3 style="font-family: tahoma;">@lang('validation.approveMsg')</h3>
                    @if(isset(Auth::user()->id) and (Auth::user()->approved == 0 and Auth::user()->why != "" ))
                        <h3> 
                            @lang('validation.msgWhy')
                        </h3>
                        <h4>
                            <a href="mailto:sadakateam@gmail.com">sadakateam@gmail.com</a>
                        </h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

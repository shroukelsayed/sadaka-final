@extends('layouts.adminlayout')

@section('header')

<h1 style="margin-left: 100px;">
    <i class="glyphicon glyphicon-align-justify"></i> All Charities
    
</h1>

<ol class="breadcrumb">
    <li><a href="{{URL::to('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{URL::to('/logout')}}"> logout</a> </li>
</ol>
    
@endsection

@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
            @if($charities->count())
                
                @foreach ($charities as $chairty)
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><a style="color: white;" href="{{ route('charities.show', $chairty->id) }}">{{$chairty->user->name}}</a></h3>
                  <h5 class="widget-user-desc">Charity</h5>
                </div>
                <div class="widget-user-image">
                <a href="{{ route('charities.show', $chairty->id) }}">
                  <img class="img-circle" style="width: 120px;height: 100px;margin-left: -12px;margin-top: -8px;border:3px solid white;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                </a>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Tax Number</h5>
                        <span class="description-text">{{$chairty->taxnum}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Date Of Publicity</h5>
                        <span >{{$chairty->publishdate}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Phone</h5>
                        <span class="description-text">{{$chairty->user->phone}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    
                  </div><!-- /.row -->
                </div>
              </div><!-- /.widget-user -->
            </div><!-- /.col -->

                        @endforeach
                
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection

@extends('layouts.adminlayout')

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script src="/Admin/vaild.js" type="text/javascript"></script>


@section('header')
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> Compaigns
            <a class="btn btn-success pull-right" href="{{ route('compaigns.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
@endsection

@section('content')
    <div class="row" style="margin-top: 50px;">
        
        <div class="col-md-12">
            @if($compaigns->count())
                
                @foreach ($compaigns as $compain)
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><a style="color: white;" href="{{ route('compaigns.show', $compain->id) }}">{{$compain->title}}</a></h3>
                  <h5 class="widget-user-desc">Compaign</h5>
                </div>
                <div class="widget-user-image">
                <a href="{{ route('compaigns.show', $compain->id) }}">
                  <img class="img-circle" style="width: 120px;height: 100px;margin-left: -12px;margin-top: -8px;border:3px solid white;" src="{{ asset("compagin/1.jpg") }}" alt="User Avatar">
                </a>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Start Date</h5>
                        <span class="description-text">{{$compain->startdate}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header"> Location</h5>
                        <span >{{$compain->location}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">End Date</h5>
                        <span class="description-text">{{$compain->enddate}}</span>
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





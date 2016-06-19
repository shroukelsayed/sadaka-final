@extends('layouts.adminlayout')

@section('header')

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script src="/Admin/vaild.js" type="text/javascript"></script>
    
@endsection


@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
        	<h1>Compaigns</h1>
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
                  <img class="img-circle" style="width: 120px;height: 100px;margin-left: -12px;margin-top: -8px;border:3px solid white;" src="{{ asset("compagin/1.png") }}" alt="User Avatar">
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
      
        <hr style="border: 2px solid #333;"> 

        <div class="col-md-12">
        	<h1>Cases</h1>
            @if($cases->count())
                
                @foreach ($cases as $case)
            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><a style="color: white;" href="{{ route('people.show', $case->id) }}">{{$case->personInfo->name}}</a></h3>
                  <h5 class="widget-user-desc">Case</h5>
                </div>
                <div class="widget-user-image">
                <a href="{{ route('people.show', $case->id) }}">
                  <img class="img-circle" style="width: 120px;height: 100px;margin-left: -12px;margin-top: -8px;border:3px solid white;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                </a>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Address</h5>
                        <span class="description-text">{{$case->personInfo->address}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header"> Donation Type </h5>
                        <span >{{$case->donationType->type}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Published at </h5>
                        <span class="description-text">{{$case->publishat}}</span>
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

@extends('layouts.adminlayout')

@section('header')

<h1 style="margin-left: 100px;">
    <i class="glyphicon glyphicon-align-justify"></i> All Benefactors
    
</h1>

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
            @if(count($user_infos))
                
                @foreach($user_infos as $user_info)

            <div class="col-md-6">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username"><a style="color: white;" href="{{ route('user_infos.show', $user_info->id) }}">{{$user_info->firstName}} {{$user_info->lastName}}</a></h3>
                  <h5 class="widget-user-desc">Benefactor</h5>
                </div>
                <div class="widget-user-image">
                  <a href="{{ route('user_infos.show', $user_info->id) }}">
                  <img class="img-circle" style="width: 120px;height: 100px;margin-left: -12px;margin-top: -8px;border:3px solid white;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                </a>
                </div>
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">National ID</h5>
                        <span class="description-text">{{$user_info->nationalid}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4 border-right">
                      <div class="description-block">
                        <h5 class="description-header">Phone</h5>
                        <span class="description-text">{{$user_info->user->phone}}</span>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-4">
                      <div class="description-block">
                        <h5 class="description-header">Gender</h5>
                        <span >{{$user_info->gender}}</span>
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
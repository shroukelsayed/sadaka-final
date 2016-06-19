@extends('layouts.adminlayout')

@section('header')
<div class="page-header clearfix">
    <h1 style="margin-left: 80px;">
         Persons
    </h1>
</div>

<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">
    @if($person_infos->count())

        @foreach ($person_infos as $one)
        <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color:#00A7D0">
              <a href="{{ route('people.show', $one->id) }}"><h3 style="color: white;" class="widget-user-username">{{$one->name}}</h3></a>
              <h5 class="widget-user-desc"></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ asset("img/1.png") }}" alt="User Avatar">
            </div>
            <div class="box-footer" style="height: 150px;">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                        Address
                    </h5>
                    <span>
                        {{$one->address}}
                    </span>
                  </div>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                        Phone
                    </h5>
                    <span>
                        {{$one->phone}}
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">
                        Gender
                    </h5>
                    <span>
                        {{$one->gender}}
                    </span>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        @endforeach
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

</div>

@endsection
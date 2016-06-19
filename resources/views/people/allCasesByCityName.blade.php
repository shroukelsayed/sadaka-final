@extends('layouts.adminlayout')

@section('header')

<div class="row pull-right">
<div id="filterSelect" class="col-md-12">
        <select class="form-control" onChange="window.location.href=this.value">
          <option selected >Plz Choose City</option>
          @foreach($cities as $city)
          <option value='{{URL::to("allCasesByCityName","$city->name" )}}'>{{$city->name}}</option>
          @endforeach
        </select>
    </div>
  
</div>
<div class="page-header clearfix">
    <h1 style="margin-left: 80px;">
         Cases
    </h1>
</div>

<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

@section('content')
<div class="row">

    @if($personinfo->count())

        @foreach ($personinfo as $person)

        @foreach ($person->people as $one)
        <div class="col-md-4">
        <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color:#00A7D0">
            @if($one->donationType->id == 1)
              <a href="{{ route('bloods.show', $one->blood->id) }}"><h3 style="color: white;" class="widget-user-username">{{$one->personInfo->name}}</h3></a>
            @elseif($one->donationType->id == 2)
               <a href="{{ route('money.show', $one->money->id) }}"><h3 style="color: white;" class="widget-user-username">{{$one->personInfo->name}}</h3></a>
            @elseif($one->donationType->id == 3)
               <a href="{{ route('medicines.show', $one->medicine->id) }}"><h3 style="color: white;" class="widget-user-username">{{$one->personInfo->name}}</h3></a>
            @else 
               <a href="{{ route('others.show', $one->other->id) }}"><h3 style="color: white;" class="widget-user-username">{{$one->personInfo->name}}</h3></a>
            @endif
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
                        {{$one->personInfo->address}}
                    </span>
                  </div>
                </div>
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header">
                        Donation Type
                    </h5>
                    <span>
                        {{$one->donationType->type}}
                    </span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">
                        Published at 
                    </h5>
                    <span>
                        {{$one->publishat}}
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endforeach
    @else
        <h3 class="text-center alert alert-info">Empty!</h3>
    @endif

</div>

@endsection
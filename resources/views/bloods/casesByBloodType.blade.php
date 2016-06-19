@extends('layouts.layout')
@section('header')
  <style>
    #caseImg{
        width: 255px;
        height: 200px;
        /*margin-top: -10px;*/
    }

    .cause{
        height: 450px;
    }
  </style>

@endsection
@section('content')
    <div class="row"> 
            <div class="col-md-12">
                @foreach($personinfo as $one)
                    <div class="col-md-3 col-sm-6">
                        <div class="cause">
                            @if($one->donation_type_id == 1)
                                <a href="{{ route('bloods.show',$one->blood->id) }}"><div class="element-img"><img id="caseImg" src="{{ asset("Case/PersonDocument/blood/$doc->document") }}"></div></a>

                                <h4 class="cause-title" style='text-transform:uppercase'>Blood</h4>
                                
                                <div class="caption">
                                    <h3><a class="element-link" href="{{ route('bloods.show',$one->blood->id) }}">{{$one->title}}</a></h3>
                                    <p>{{$one->desc}}</p>
                                </div>
                            @elseif($one->donation_type_id == 2)
                                <a href="{{ route('money.show',$one->money->id) }}"><div class="element-img"><img id="caseImg" src="{{ asset("Case/PersonDocument/money/$doc->document") }}"></div></a>

                                <h4 class="cause-title" style='text-transform:uppercase'>Money</h4>
                                <div class="caption">
                                    <h3><a class="element-link" href="{{ route('money.show',$one->money->id) }}">{{$one->title}}</a></h3>
                                    <p>{{$one->desc}}</p>
                                </div>
                            @elseif($one->donation_type_id == 3)
                                <a href="{{ route('medicines.show',$one->medicine->id) }}"><div class="element-img"><img id="caseImg" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}"></div>

                                <h4 class="cause-title" style='text-transform:uppercase'>Medicine</h4></a>
                                <div class="caption">
                                    <h3><a class="element-link" href="{{ route('medicines.show',$one->medicine->id) }}">{{$one->title}}</a></h3>
                                    <p>{{$one->desc}}</p>
                                </div>
                            @else
                                <a href="{{ route('others.show',$one->other->id) }}"><div class="element-img"><img id="caseImg" src="{{ asset("Case/PersonDocument/other/$doc->document") }}"></div></a>

                                <h4 class="cause-title" style='text-transform:uppercase'>Other</h4>
                                <div class="caption">
                                    <h3><a class="element-link" href="{{ route('others.show',$one->other->id) }}">{{$one->title}}</a></h3>
                                    <p>{{$one->desc}}</p>
                                </div>
                            @endif
                            <div class=" text-center">
                                @if (Auth::guest())
                                    <a href="{{ url('/login') }}" class="btn btn-primary" > DONATE NOW</a>
                                @else
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donateModal"> DONATE NOW</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        
    </div>
@endsection

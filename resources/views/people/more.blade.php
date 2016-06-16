@extends('layouts.layout')
@section('content')
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>

    
    @foreach($person_info->people as $p)
        @if($p->donationType->id == 1)
             <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <div class="widget-user-image">
                            <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                          </div><!-- /.widget-user-image -->
                          <h3 class="widget-user-username" style="margin-left:150px; ">{{$person_info->name}}</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <strong><i class="fa fa-user" aria-hidden="true"></i>
                                <label for="nome">Case Name</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->name}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Amount</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->blood->amount}} Blood Bags</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Hospital Address</label></strong>
                                 <h7 style="margin-left: 40px;" class="form-control-static">{{$p->blood->governorate->name}}, {{$p->blood->city->name}}, {{$p->blood->address}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-calendar" aria-hidden="true"></i>
                                <label for="birthdate">Birth Date</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->birthdate}}</h7>
                            </a></li>
                            <li><a>
                                <label for="gender">Gender</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->gender}}</h7>
                            </a></li>
                             <li><a>
                                <label for="maritalstatus">Marital Status</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->maritalstatus}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-mobile"></i>
                                <label for="phone">Phone</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->phone}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Case Address</label></strong>
                                 <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->governorate->name}}, {{$person_info->city->name}}, {{$person_info->address}}</h7>
                            </a></li>
                              @foreach($p->personDocs as $doc)
                              <li><a>
                                <strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                  <br>
                                <img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/blood/$doc->document") }}" alt="$doc->document" />
                                <br>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->

                    <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

                </div>
            </div>
        @elseif($p->donationType->id == 2)
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <div class="widget-user-image">
                            <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                          </div><!-- /.widget-user-image -->
                          <h3 class="widget-user-username" style="margin-left:150px; ">{{$person_info->name}}</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <strong><i class="fa fa-user" aria-hidden="true"></i>
                                <label for="nome">Case Name</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->name}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Donation Amount</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->money->amount}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-calendar" aria-hidden="true"></i>
                                <label for="birthdate">Birth Date</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->birthdate}}</h7>
                            </a></li>
                            <li><a>
                                <label for="gender">Gender</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->gender}}</h7>
                            </a></li>
                             <li><a>
                                <label for="maritalstatus">Marital Status</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->maritalstatus}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-mobile"></i>
                                <label for="phone">Phone</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->phone}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Address</label></strong>
                                 <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->governorate->name}}, {{$person_info->city->name}}, {{$person_info->address}}</h7>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                  <br>
                                <img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document" />
                                <br>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->

                    <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

                </div>
            </div>
        @elseif($p->donationType->id == 3)
             <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <div class="widget-user-image">
                            <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                          </div><!-- /.widget-user-image -->
                          <h3 class="widget-user-username" style="margin-left:150px; ">{{$person_info->name}}</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <strong><i class="fa fa-user" aria-hidden="true"></i>
                                <label for="nome">Case Name</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->name}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Medicine Name</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->medicine->name}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Medicine Quantity</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->medicine->amount}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-calendar" aria-hidden="true"></i>
                                <label for="birthdate">Birth Date</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->birthdate}}</h7>
                            </a></li>
                            <li><a>
                                <label for="gender">Gender</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->gender}}</h7>
                            </a></li>
                             <li><a>
                                <label for="maritalstatus">Marital Status</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->maritalstatus}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-mobile"></i>
                                <label for="phone">Phone</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->phone}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Address</label></strong>
                                 <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->governorate->name}}, {{$person_info->city->name}}, {{$person_info->address}}</h7>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                  <br>
                                <img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" />
                                <br>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->

                    <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

                </div>
            </div>
        @else
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <div class="widget-user-image">
                            <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                          </div><!-- /.widget-user-image -->
                          <h3 class="widget-user-username" style="margin-left:150px; ">{{$person_info->name}}</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <strong><i class="fa fa-user" aria-hidden="true"></i>
                                <label for="nome">Case Name</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->name}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Case Description </label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->other->description}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-calendar" aria-hidden="true"></i>
                                <label for="birthdate">Birth Date</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->birthdate}}</h7>
                            </a></li>
                            <li><a>
                                <label for="gender">Gender</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->gender}}</h7>
                            </a></li>
                             <li><a>
                                <label for="maritalstatus">Marital Status</label>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->maritalstatus}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-mobile"></i>
                                <label for="phone">Phone</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->phone}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Address</label></strong>
                                 <h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->governorate->name}}, {{$person_info->city->name}}, {{$person_info->address}}</h7>
                            </a></li>
                            <li><a>
                                <strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong>
                                <h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                  <br>
                                <img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document" />
                                <br>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->

                    <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

                </div>
            </div>
        @endif
    @endforeach
        
@endsection



@endsection
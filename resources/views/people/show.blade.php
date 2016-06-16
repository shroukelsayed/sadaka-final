@extends('layouts.adminlayout')
@section('header')
<style>

a.fancybox img {
    border: none;
    box-shadow: 0 1px 7px rgba(0,0,0,0.6);
    -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
} 
a.fancybox:hover img {
    position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
}

#imgdosc{

    width:250px;
    height:150px;
    margin-left:45px;
}
#apro{

     margin-top:30px;
     z-index: 6;
     margin-right:40px;
     position:relative;
}

#apro1{

     margin-top:30px;
     z-index: 6;
     margin-right:100px;
      position:relative;
}
</style>
    <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

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
  <div class="btn-group pull-right" role="group" aria-label="...">
        <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('person_infos.edit', $person_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
  </div>
    <div class="row" style="margin-top: 50px;">
      <div class="col-md-12">
         <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header" style="background-color: #EDB6B6;">
              <div class="widget-user-image">
                <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
              </div><!-- /.widget-user-image -->
              <h3 class="widget-user-username" style="margin-left:150px; ">Person Information</h3>
              <h3 class="widget-user-username" style="margin-left:150px; ">{{$person_info->name}}</h3>
            </div>
            <div class="box-footer no-padding col-md-12">
              <ul class="nav nav-stacked">
                <li><a>
                    <div class="row">
                        <div class="col-md-3"><strong><i class="fa fa-user" aria-hidden="true"></i>
                        <label for="nome">Case Name</label></strong></div>
                        <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->name}}</h7></div>
                    </div>
                </a></li>
                <li><a>
                    <div class="row">
                        <div class="col-md-3"><strong><i class="fa fa-calendar" aria-hidden="true"></i>
                    <label for="birthdate">Birth Date</label></strong></div>
                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->birthdate}}</h7></div>
                    </div>
                </a></li>
                <li><a>
                    <div class="row">
                        <div class="col-md-3"><label for="gender">Gender</label></div>
                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->gender}}</h7></div>
                    </div>
                </a></li>
                 <li><a>
                    <div class="row">
                        <div class="col-md-3"><label for="maritalstatus">Marital Status</label></div>
                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->maritalstatus}}</h7></div>
                    </div>
                </a></li>
                <li><a>
                    <div class="row">
                        <div class="col-md-3"><strong><i class="fa fa-mobile"></i>
                    <label for="phone">Phone</label></strong></div>
                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->phone}}</h7></div>
                    </div>
                </a></li>
                <li><a>
                    <div class="row">
                        <div class="col-md-3"><strong><i class="fa fa-map-marker margin-r-5"></i>
                    <label for="address">Case Address</label></strong></div>
                     <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$person_info->governorate->name}}, {{$person_info->city->name}}, {{$person_info->address}}</h7></div>
                     </div>
                </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    @foreach($person_info->people as $p)
        @if($p->donationType->id == 1)
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('bloods.edit', $p->blood->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        @elseif($p->donationType->id == 2)
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('money.edit', $p->money->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        @elseif($p->donationType->id == 3)
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('medicines.edit', $p->medicine->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        @else
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('others.edit', $p->other->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
            </div>
        @endif
        
        @if($p->donationType->id == 1)
             <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <h3 class="widget-user-username" style="margin-left: 30px;">Blood Case Information</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding col-md-12">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <label for="description">Amount</label></strong></div>
                                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->blood->amount}} Blood Bags</h7>
                                    </div>
                                </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <label for="description">End Date</label></strong></div>
                                    <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->blood->end_date}} </h7>
                                    </div>
                                </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-map-marker margin-r-5"></i>
                                <label for="address">Hospital Address</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->blood->governorate->name}}, {{$p->blood->city->name}}, {{$p->blood->address}}</h7></div>
                                 </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong></div>
                                <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7></div>
                                </div>
                            </a></li>
                              @foreach($p->personDocs as $doc)
                              <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-picture-o"></i>
                               <label for="case_doc_field">Case Documents</label></strong>
                                  <br></div>
                                 <div class="col-md-9"><img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/blood/$doc->document") }}" alt="$doc->document" /></div>
                                 </div>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                       </div>
                      </div><!-- /.widget-user -->
                </div>
        @elseif($p->donationType->id == 2)
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <h3 class="widget-user-username" style="margin-left: 30px;">Money Case Information</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Donation Amount</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->money->amount}}</h7></div>
                                 </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7></div>
                                 </div>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong></div>
                                  <br>
                                 <div class="col-md-9"><img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document" /></div>
                                 </div>
                                </a></li>
                              @endforeach
                          </ul>
                      </div><!-- /.widget-user -->
                </div>
            </div>
            </div>
        @elseif($p->donationType->id == 3)
             <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <h3 class="widget-user-username" style="margin-left: 30px;">Medicine Case Information</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Medicine Name</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->medicine->name}}</h7></div>
                                 </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Medicine Quantity</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->medicine->amount}}</h7></div>
                                 </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7></div>
                                 </div>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong></div>
                                  <br>
                                 <div class="col-md-9"><img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" /></div>
                                 </div>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->
                </div>
            </div>
        @else
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-12">
                     <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color: #EDB6B6;">
                          <h3 class="widget-user-username" style="margin-left: 30px;">Other Case Information</h3>
                          <h7 class="widget-user-desc" style="margin-left:30px; ">
                          <i class="fa fa-clock-o" aria-hidden="true"></i>
                            Published At : {{$p->publishat}}</h7>
                          
                        </div>
                        <div class="box-footer no-padding">
                          <ul class="nav nav-stacked">
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                                <label for="description">Case Description </label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->other->description}}</h7></div>
                                 </div>
                            </a></li>
                            <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                                <label for="phone">Donation Interval</label></strong></div>
                                 <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$p->intervalType->type}}</h7></div>
                                 </div>
                            </a></li>
                             @foreach($p->personDocs as $doc)
                              <li><a>
                                <div class="row">
                                    <div class="col-md-3"><strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                  <br></div>
                                 <div class="col-md-9"><img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document" /></div>
                                 </div>
                                </a></li>
                              @endforeach
                          </ul>
                        </div>
                      </div><!-- /.widget-user -->
                </div>
            </div>
        @endif
    @endforeach
        <a class="btn btn-link" href="{{ route('people.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
@endsection
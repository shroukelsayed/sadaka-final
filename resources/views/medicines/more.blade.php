@extends('layouts.layout')
@section('header')
<div class="page-header">
        <h1>Case Name --- {{$medicine->person->personInfo->name}}</h1>
        
        
        
    </div>
<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

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
    margin-left:150px;
}
</style>
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

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
             <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" >

                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$medicine->person->personInfo->name}}</h3>
                  <h7 class="widget-user-desc" style="margin-left:30px; ">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                    Published At : {{$medicine->person->publishat}}</h7>
                  
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <strong><i class="fa fa-user" aria-hidden="true"></i>
                        <label for="nome">Case Name</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->name}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                        <label for="description">Medicine Name</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->name}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                        <label for="description">Medicine Quantity</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->amount}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                        <label for="phone">Donation Interval</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->intervalType->type}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-calendar" aria-hidden="true"></i>
                        <label for="birthdate">Birth Date</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->birthdate}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">Gender</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->gender}}</h7>
                    </a></li>
                     <li><a>
                        <label for="maritalstatus">Marital Status</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->maritalstatus}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-mobile"></i>
                        <label for="phone">Phone</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->phone}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-map-marker margin-r-5"></i>
                        <label for="address">Address</label></strong>
                         <h7 style="margin-left: 40px;" class="form-control-static">{{$medicine->person->personInfo->governorate->name}}, {{$medicine->person->personInfo->city->name}}, {{$medicine->person->personInfo->address}}</h7>
                    </a></li>
                    @foreach($medicine->person->personDocs as $doc)
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

            <a class="btn btn-link" href="{{ route('person_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

@endsection
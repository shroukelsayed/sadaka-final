@extends((Auth::user()->user_type_id == 2 or Auth::user()->user_type_id == 3 ) ? 'layouts.adminlayout' : 'layout')
@section('header')

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
    margin-left:45px;
}
</style>
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

    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
             <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #EDB6B6;">
                    <div class="btn-group pull-right" role="group" aria-label="...">
                        <a class="btn btn-primary btn-group" role="group" href="{{ route('others.edit', $other->id) }}" style="margin-right: 20px; margin-top: 10px;"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    </div>
                  <div class="widget-user-image">
                    <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$other->person->personInfo->name}}</h3>
                  <h7 class="widget-user-desc" style="margin-left:30px; ">
                  <i class="fa fa-clock-o" aria-hidden="true"></i>
                    Published At : {{date('F d, Y', strtotime($other->person->publishat))}}</h7>
                  
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-user" aria-hidden="true"></i>
                            <label for="nome">Case Name</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->name}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                            <label for="name">National ID</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->nationalid}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-list-alt" aria-hidden="true"></i>
                        <label for="description">Case Description </label></strong></div>
                        <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->description}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-th-list" aria-hidden="true"></i>
                            <label for="description">Title</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->title}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-align-justify" aria-hidden="true"></i>
                            <label for="phone">Description</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->desc}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                            <label for="phone">Status</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personStatus->type}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-calendar" aria-hidden="true"></i>
                            <label for="birthdate">Birth Date</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->birthdate}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><i class="fa fa-male" aria-hidden="true"></i>/<i class="fa fa-female" aria-hidden="true"></i> 
                            <label for="gender">Gender</label></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->gender}}</h7></div>
                        </div>
                    </a></li>
                     <li><a>
                        <div class="row">
                            <div class="col-md-3">
                            <i class="fa fa-circle-o" aria-hidden="true"></i>
                            <label for="maritalstatus">Marital Status</label></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->maritalstatus}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-mobile"></i>
                            <label for="phone">Phone</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->phone}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-map-marker margin-r-5"></i>
                            <label for="address">Address</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->personInfo->governorate->name}}, {{$other->person->personInfo->city->name}}, {{$other->person->personInfo->address}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-clock-o" aria-hidden="true"></i>
                            <label for="phone">Donation Interval</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$other->person->intervalType->type}}</h7></div>
                        </div>
                    </a></li>
                     @foreach($other->person->personDocs as $doc)
                      <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong><i class="fa fa-picture-o"></i>
                                <label for="case_doc_field">Case Documents</label></strong>
                                 <p>{{$doc->desc}}</p>
                            </div>
                            <div class="col-md-9"><img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document" /></div>
                        </div>
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
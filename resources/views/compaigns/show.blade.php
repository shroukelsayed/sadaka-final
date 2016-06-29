@extends('layouts.adminlayout')
@section('css')


@endsection

@section('header')
 
 <div class="page-header">
    <h1>Compaigns</h1>
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
    margin-left:45px;
}

#apro{

     margin-top:-80px;
     margin-left:700px;
     width: 100px;
     height: 40px;
     font-size: 16px;
}


</style>

           

@endsection


@section('content')





    <div class="row" >
        <div class="col-md-12">
             <!-- Widget: user widget style 1 -->
               <div id="info" class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #EDB6B6;">
                  <div class="widget-user-image">
                    <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$compaign->title}}</h3>
                  <h5 class="widget-user-desc" style="margin-left:160px; ">Compagin</h5>
                  <a id="apro" class="btn btn-warning btn-group" role="group" href="{{ route('compaigns.edit', $compaign->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="nationalid">LOCATION</label></strong></div>
                             <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->location}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="gender">STARTDATE</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->startdate}}</h7></div>
                        </div>
                    </a></li>

                    <li><a>
                         <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="gender">ENDDATE</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->enddate}}</h7></div>
                        </div>
                    </a></li>

                    <li><a>
                    <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="birthdate">BUDGET</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->budget}}</h7></div>
                        </div>
                    </a></li>

                    <li><a>
                    <div class="row">
                            <div class="col-md-3">
                            <strong><i class="fa fa-map-marker margin-r-5"></i></strong>
                            <strong><label for="address">Address</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">
                                {{$compaign->governorate->name}},
                                {{$compaign->city->name}},
                            </h7></div>
                        </div>
                    </a></li>
                    

                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="birthdate">Description</label></strong></div>
                            <div class="col-md-9">
                            <h7  style="margin-left: 40px;" class="form-control-static">{{$compaign->description}}</h7></div>
                        </div>
                    </a></li>
 
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong>
                            <label for="address">Image</label></strong></div>
                            <div class="col-md-9">      
                            <img id="imgdosc" class="fancybox" src="{{asset("compagin/$compaign->image")}}" ></div>
                        </div>
                    </a></li>  
                    </div>
                    <br>
                  </ul>
                </div>
              </div>

        



            <a class="btn btn-link" href="{{ route('charities.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>


 <!-- script -->

<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

<script type="text/javascript" src="Admin/jquery-ui.min.js"></script>
<script src="/Admin/vaild.js" type="text/javascript"></script>

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





@endsection


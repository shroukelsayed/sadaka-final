@extends('layouts.layout' )

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
    margin-left:150px;
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



    <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">
             <!-- Widget: user widget style 1 -->
               <div id="info" class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" ">

                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$compaign->title}}</h3>
                  <h5 class="widget-user-desc" style="margin-left:160px; ">Compagin</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <label for="nationalid">LOCATION</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->location}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">STARTDATE</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->startDate}}</h7>
                    </a></li>

                    <li><a>
                        <label for="gender">ENDDATE</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->endDate}}</h7>
                    </a></li>

                    <li><a>
                        <label for="birthdate">BUDGET</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->budget}}</h7>
                    </a></li>

                    <li><a>
                        <label for="birthdate">Description</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$compaign->description}}</h7>
                    </a></li>
 
                    <li><a>
                        <strong><i class="fa fa-map-marker margin-r-5"></i>
                        <label for="address">Address</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">
                            {{$compaign->governorate->name}},
                            {{$compaign->city->name}},
                        </h7>
                    </a></li>
                    

                    <div>
                        <label for="address">Image</label>    
                        <li>   
                            <img id="imgdosc" class="fancybox" src="{{asset("compagin/$compaign->image")}}" >
                        </li>
                    </div>
                    <br>
                  </ul>
                </div>
              </div>

        



            <a class="btn btn-link" href="{{ route('charities.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>


@endsection



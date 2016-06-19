@extends(( (isset(Auth::user()->id)) and Auth::user()->user_type_id  == 1 or Auth::user()->user_type_id  == 2 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layout')

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
    <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
 <div><br></div>  
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
<div><br><br></div>
    <div class="row">
        <div class="col-md-12">

             <!-- Widget: user widget style 1 -->
              <div id="info" class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #EDB6B6;">
                    <div class= "pull-right">
                        @if(Auth::user()->user_type_id === 1)
                            @if ($charity->user->approved === 0)
                                <a  class="btn btn-primary" name="approve" href="{!! URL::to('approveCharity',['charity_id'=>$charity->id]) !!}"><i class="glyphicon glyphicon-edit"></i> Approve</a>

                            @elseif ($charity->user->approved === 1)

                                <a  href="#" class="btn btn-primary" data-toggle="modal" data-target="#disapproveModel"> <i class="glyphicon glyphicon-edit"></i>Disapprove</a>

                            @endif
                        @else
                            <a id="apro" class="btn btn-primary" href="{{ route('charities.edit', $charity->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                        @endif
                    </div>
                  <div class="widget-user-image">
                    <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$charity->user->name}}</h3>
                  <h5 class="widget-user-desc" style="margin-left:160px; ">Charity</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong> 
                            <label for="nationalid">Tax Number</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$charity->taxnum}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong> 
                            <label for="gender">E-mail</label></strong></div>
                            <div class="col-md-9"><h7 style="margin-left: 40px;" class="form-control-static">{{$charity->user->email}}</h7></div>
                        </div>

                    </a></li>
                    <li><a>
                    <div class="row">
                            <div class="col-md-3"><strong> 
                            <label for="gender">Phone</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->user->phone}}</h7></div>
                        </div>
                    </a></li>
                    <li><a>
                         <div class="row">
                            <div class="col-md-3"><strong> 
                            <label for="birthdate">Date Of Publicity</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->publishdate}}</h7></div>
                        </div>
                    </a></li>
                    @foreach($charity->charityAddress as $address) 
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong> 
                            <i class="fa fa-map-marker margin-r-5"></i>
                            <label for="address">Address</label></strong></div>
                            <div class="col-md-9">
                            <h7 style="margin-left: 40px;" class="form-control-static">
                                {{$address->governorate->name}},
                                {{$address->city->name}},
                                {{$address->address}}

                            </h7></div>
                        </div>
                        
                    </a></li>
                    @endforeach
                    @foreach($charity->charityDocument as $docs)
                    <li><a>
                        <div class="row">
                            <div class="col-md-3"><strong> 
                            <label for="address">Charity Documents</label></strong></div>
                            <div class="col-md-9">                     
                            <img id="imgdosc" class="fancybox" src="{{asset("img/$docs->doc")}}" ></div>
                        </div>
                    </a></li>
                    @endforeach
                  </ul>
                </div>
              </div>

        



            <a class="btn btn-link" href="{{ route('charities.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

    <div class="modal fade" id="disapproveModel" tabindex="-1" role="dialog" aria-labelledby="disapproveModelLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="disapproveModelLabel">Why Disapprove Account ?</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{!! URL::to('disapproveCharity',['charity_id'=>$charity->id]) !!}" method="POST">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                         
                                <label>Reason for Disapprove</label>
                                <textarea class="form-control" name="why"></textarea>
                                <button type="submit" class="btn btn-primary pull-right" style="margin: 10px;"  >Disapprove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.modal -->

@endsection

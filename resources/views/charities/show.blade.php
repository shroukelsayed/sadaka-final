@extends(( (isset(Auth::user()->id)) and Auth::user()->user_type_id  == 1 or Auth::user()->user_type_id  == 2 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layout')

@section('header')
    <h1>
        {{$charity->user->name}}
        <small>Profile</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{URL::to('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/logout')}}"> logout</a> </li>
    </ol>
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

         margin-top:60px;
         z-index: 6;
         margin-right:30px;
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
    <div class="row">
        <div class="col-md-12">

            <div id="approve" class="page-header">
                 <div class="btn-group pull-right" role="group" aria-label="...">
                @if(Auth::user()->user_type_id === 1)
                    @if ($charity->user->approved === 0)
                        <a id="apro" class="btn btn-primary btn-group" name="approve" role="group" href="{!! URL::to('approveCharity',['charity_id'=>$charity->id]) !!}"><i class="glyphicon glyphicon-edit"></i> Approve</a>

                    @elseif ($charity->user->approved === 1)

                        <a style="margin-right: 20px;" href="#" class="btn btn-primary" data-toggle="modal" data-target="#disapproveModel"> Disapprove</a>

                    @endif
                @else
                    <a id="apro" class="btn btn-primary btn-group" role="group" href="{{ route('charities.edit', $charity->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                @endif
            </div>
        </div>

            

             <!-- Widget: user widget style 1 -->
              <div id="info" class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #EDB6B6;">
                  <div class="widget-user-image">
                    <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$charity->user->name}}</h3>
                  <h5 class="widget-user-desc" style="margin-left:160px; ">Charity</h5>
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <label for="nationalid">Tax Number</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->taxnum}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">E-mail</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->user->email}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">Phone</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->user->phone}}</h7>
                    </a></li>
                    <li><a>
                        <label for="birthdate">Date Of Publicity</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$charity->publishdate}}</h7>
                    </a></li>
                    @foreach($charity->charityAddress as $address) 
                    <li><a>
                        <strong><i class="fa fa-map-marker margin-r-5"></i>
                        <label for="address">Address</label></strong>
                        <h7 style="margin-left: 40px;" class="form-control-static">
                            {{$address->governorate->name}},
                            {{$address->city->name}},
                            {{$address->address}}

                        </h7>
                        
                    </a></li>
                    @endforeach
                    @foreach($charity->charityDocument as $docs)
                    <li><a>
                        <label for="address">Charity Documents</label>                     
                            <img id="imgdosc" class="fancybox" src="{{asset("img/$docs->doc")}}" >
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
                         
                                <label class="form-control">Reason for Disapprove</label>
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

@extends(( (isset(Auth::user()->id)) and Auth::user()->user_type_id  == 1 or Auth::user()->user_type_id  == 2 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layouts.layout')

@section('header')

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <h1>
        {{$user_info->user->name}}
        <small>Profile</small>
    </h1>

    <ol class="breadcrumb">
        <li><a href="{{URL::to('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/logout')}}"> logout</a> </li>
    </ol>
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
             <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header" style="background-color: #EDB6B6;">
                  <div class="widget-user-image">
                    <img class="img-circle" style="width: 120px;height: 70px;" src="{{ asset("img/1.png") }}" alt="User Avatar">
                  </div><!-- /.widget-user-image -->
                  <h3 class="widget-user-username" style="margin-left:150px; ">{{$user_info->user->name}}</h3>
                  @if($user_info->user->user_type_id === 3)
                    <h5 class="widget-user-desc" style="margin-left:160px; ">Benefactor</h5>
                  @elseif($user_info->user->user_type_id === 1)
                    <h5 class="widget-user-desc" style="margin-left:160px; ">Admin</h5>
                  @endif
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    <li><a>
                        <label for="nome">First Name</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->firstName}}</h7>
                    </a></li>
                    <li><a>
                        <label for="nome">Last Name</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->lastName}}</h7>
                    </a></li>
                    <li><a>
                        <label for="nationalid">National ID</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->nationalid}}</h7>
                    </a></li>
                    <li><a>
                        <label for="birthdate">Birth Date</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->birthdate}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">E-mail</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->user->email}}</h7>
                    </a></li>
                    <li><a>
                        <label for="gender">Phone</label>
                        <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->user->phone}}</h7>
                    </a></li>
                    <li><a>
                        <strong><i class="fa fa-map-marker margin-r-5"></i>
                        <label for="address">Address</label></strong>
                         
                         <h7 style="margin-left: 40px;" class="form-control-static">{{$user_info->governorate->name}}, {{$user_info->city->name}}, {{$user_info->address}}</h7>
                    </a></li>
                  </ul>
                </div>
              </div><!-- /.widget-user -->

            <div class="page-header">
            <div class="btn-group pull-right" role="group" aria-label="...">
                @if($user_info->user->user_type_id === 1 and Auth::user()->user_type_id === 1)
                    <a style="margin-top: -420px;margin-right: 20px;" class="btn btn-primary btn-group" role="group" href="{{ route('user_infos.edit', $user_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                @elseif(Auth::user()->user_type_id === 1)
                    @if ($user_info->user->approved === 0)
                        <a style="margin-top: -420px;margin-right: 20px;" class="btn btn-primary btn-group" name="approve" role="group" href="{!! URL::to('approve',['user_id'=>$user_info->id]) !!}"><i class="glyphicon glyphicon-edit"></i> Approve</a>

                    @elseif ($user_info->user->approved === 1)

                        <a style="margin-top: -420px;margin-right: 20px;" href="#" class="btn btn-primary" data-toggle="modal" data-target="#disapproveModel"> Disapprove</a>

                    @endif
                @else
                    <a style="margin-top: -420px;margin-right: 20px;" class="btn btn-primary btn-group" role="group" href="{{ route('user_infos.edit', $user_info->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                @endif
            </div>
        </div>



            <a class="btn btn-link" href="{{ route('user_infos.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>

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
                        <form action="{!! URL::to('disapprove',['user_id'=>$user_info->id]) !!}" method="POST">
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
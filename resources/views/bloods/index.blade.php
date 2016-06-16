@extends(( (isset(Auth::user()->id) and Auth::user()->user_type_id ) == 2 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layout')
@section('header')
    <div class="page-header clearfix">
    <h1 style="margin-left: 80px;">
        <i class="glyphicon glyphicon-align-justify"></i>Blood Cases
    </h1>
</div>
<ol class="breadcrumb">
        <li><a href="{{URL::to('/admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{URL::to('/logout')}}"> logout</a> </li>
    </ol>
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/vaild.js" type="text/javascript"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($bloods->count())
                @foreach($bloods as $blood)
                    <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background: url('{{ asset("img/1.jpg") }}') center center;">
                          <a href="{{ route('bloods.show', $blood->id) }}"><h3 class="widget-user-username">{{$blood->person->personInfo->name}}</h3></a>
                          
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="{{ asset("img/1.png") }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-4 border-right">
                              <div class="description-block">
                                <h5 class="description-header">Amount</h5>
                                <span class="description-text">{{$blood->amount}}</span>
                              </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-4 border-right">
                              <div class="description-block">
                                <h5 class="description-header">Blood Type</h5>
                                <span class="description-text">{{$blood->bloodtype}}</span>
                              </div><!-- /.description-block -->
                            </div><!-- /.col -->
                            <div class="col-sm-4">
                              <div class="description-block">
                                <h5 class="description-header">Hospital</h5>
                                <span class="description-text">{{$blood->hospital}}</span>
                              </div><!-- /.description-block -->
                            </div><!-- /.col -->
                          </div><!-- /.row -->
                        </div>
                      </div><!-- /.widget-user -->
                    </div><!-- /.col -->

                @endforeach
                             
                {!! $bloods->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection
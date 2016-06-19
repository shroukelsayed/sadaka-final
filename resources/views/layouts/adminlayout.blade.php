<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{Auth::user()->name}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet"> -->
   <link rel="stylesheet" href="/Admin/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <!-- Ionicons -->
   
    <!-- Theme style -->
    <link rel="stylesheet" href="/Admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/Admin/dist/css/skins/_all-skins.min.css">


     <link rel="stylesheet" href="/Admin/bootstrap/css/bootstrap.min.css">

     <link href="/Admin/jquery-ui.css" rel="stylesheet" type="text/css"/>

    <style>
      #profile{

          border:2px solid white;
          width:40px;
          height:40px;
          margin-top:-8px;

      }

      #profile1{

          border:2px solid white;
          width:45px;
          height:45px;
          
      }

    </style>

    
</head>
<body>
 <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><i class="fa fa-tasks" aria-hidden="true"></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{ Auth::user()->usertype }}</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="/Admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/Admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/Admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/Admin/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="/Admin/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span id="span" class="label label-warning">
                    {{$res}}
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have {{ $res }} notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      @foreach($data as $d)
                      <li>
                        <a href="{{route('userpeople.show',$d->id)}}">
                          <i class="fa fa-users text-aqua"></i>  {{$d->person->personInfo->name}}   have new donation
                        </a>
                      </li>
                        @endforeach
                        @foreach($compagins as $c)
                      <li>
                        <a href="{{route('usercompaign.show',$c->id)}}">
                          <i class="fa fa-users text-aqua"></i>  Compagin {{$c->compaign->title}} have new 
                          @if($c->donate_type_id==1)
                            Share

                          @elseif($c->donate_type_id==2)
                            Donaite

                          @else
                          Share And Donaite

                          @endif   

                        </a>
                      </li>
                        @endforeach
                    </ul>
                  </li>
                  <li class="footer"><a href="{{URL::to('/userpeople')}}">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img id="profile" src="{{ asset("img/1.png") }}" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu" style="width: 350px;">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ asset("img/1.png") }}" class="img-circle" alt="User Image">
                    <p>
                    @if(Auth::user()->user_type_id === 1)

                      {{ Auth::user()->name }} - @lang('validation.Administrator') 
                      <small>@lang('validation.Membersince') {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>

                    @elseif(Auth::user()->user_type_id === 2)

                      {{ Auth::user()->name }} - @lang('validation.charity')
                      <small>@lang('validation.Membersince') {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>

                    @else

                      {{ Auth::user()->name }} - @lang('validation.Benefactor')
                      <small>@lang('validation.Membersince') {{ date('F d, Y', strtotime(Auth::user()->created_at)) }}</small>

                    @endif
                    </p>
                  </li>
                  <!-- Menu Body -->
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                    @if((isset(Auth::user()->id)) and Auth::user()->user_type_id  == 1)
                      <a href="{{ route('user_infos.show',Auth::user()->userInfo->id )}}" class="btn btn-default btn-flat">@lang('validation.profile')</a>
                    @elseif((isset(Auth::user()->id)) and Auth::user()->user_type_id  == 2)
                      <a href="{{ route('charities.show',Auth::user()->charity->id )}}" class="btn btn-default btn-flat">@lang('validation.profile')</a>
                    @else
                      <a href="{{ route('user_infos.show',Auth::user()->userInfo->id )}}" class="btn btn-default btn-flat">@lang('validation.profile')</a>
                      <a href="{{ URL::to('changePassword',Auth::user()->userInfo->id )}}" class="btn btn-default btn-flat">@lang('validation.changePassword')</a>
                    @endif
                      
                    </div>
                    <div class="pull-right">
                      <a href="{{URL::to('/logout')}}" class="btn btn-default btn-flat">@lang('validation.logout')</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
             <!--  <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li> -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img id="profile1"  src="{{ asset("img/1.png") }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <ul class="sidebar-menu">
          <li></li>
            <li class="active treeview">
              <a href="{{URL::to('/home')}}">
                <i class="glyphicon glyphicon-home"></i> <span>@lang('validation.home')</span> 
              </a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-language"></i><span>@lang('validation.'. Config::get('languages')[App::getLocale()]) </span>

                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      @foreach (Config::get('languages') as $lang => $language)
                      @if ($lang != App::getLocale())
                      <li>
                          <a href="{{ route('lang.switch', $lang) }}"><i class="fa fa-language"></i><span>@lang('validation.'.$language)</span></a>
                      </li>
                      @endif
                      @endforeach
                  </ul>
              </li>

            @if( Auth::user()->user_type_id === 1)
             <li>
                <a href="{{URL::to('/charities')}}">
                  <i class="fa fa-th"></i> <span>@lang('validation.AllCharities')</span> 
                </a>
              </li>
              <li>
              <a href="{{URL::to('/user_infos')}}">
                  <i class="fa fa-th"></i> <span>@lang('validation.AllBenefactors')</span> 
              </a>
            </li>
            @else
              <li>
                <a href="{{URL::to('/person_infos')}}">
                  <i class="fa fa-th"></i> <span>@lang('validation.AllPersons')</span> 
                </a>
              </li>
              <li>
                <a href="{{URL::to('/people')}}">
                  <i class="fa fa-th"></i> <span>@lang('validation.AllCases')</span> 
                </a>
              </li>
              <li>
              <a href="{{URL::to('/people/create')}}">
                  <i class="fa fa-edit"></i> <span>@lang('validation.NewCase')</span> 
                </a>
              </li>
              <!-- // Start of Links to create new case ... by shrouk -->


                     <!--  <li class="treeview">
                <a href="#">
                  <i class="fa fa-edit"></i> <span>New Case</span>
                  <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{URL::to('/bloods/create')}}"><i class="fa fa-edit"></i> Blood Case</a></li>
                  <li><a href="{{URL::to('/money/create')}}"><i class="fa fa-edit"></i> Money Case</a></li>
                  <li><a href="{{URL::to('/medicines/create')}}"><i class="fa fa-edit"></i> Medicine Case</a></li>
                  <li><a href="{{URL::to('/others/create')}}"><i class="fa fa-edit"></i> Other Case</a></li>
                </ul>
              </li> -->
          <!-- // End of Links to create new case ... by shrouk -->  
                    
              <li>
               <a href="{{URL::to('/compaigns')}}">
                  <i class="fa fa-th"></i> <span>@lang('validation.AllCompaigns')</span> 
                </a>
              </li>
              <li>
              <a href="{{URL::to('/compaigns/create')}}">
                  <i class="fa fa-edit"></i> <span>@lang('validation.NewCompaign')</span> 
                </a>
              </li>
              <!-- /// cases according to donation type .. by shrouk -->
            @endif
            <!-- /// end of  -->
            <li>
            <a href="{{URL::to('/logout')}}">
                <i class="fa fa-btn fa-sign-out"></i> <span>@lang('validation.logout')</span> 
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="row pull-right">
               <div class="col-md-12">
               @if( Auth::user()->user_type_id === 2 or Auth::user()->user_type_id === 3 )
                  <label> Filter </label>
                  <select class="form-control" onChange="window.location.href=this.value" id="filter">
                    <option selected >Plz Choose</option>
                    <option value="{{URL::to('/bloods')}}">@lang('validation.BloodCases')</option>
                    <option value="{{URL::to('/money')}}">@lang('validation.MoneyCases')</option>
                    <option value="{{URL::to('/medicines')}}"> @lang('validation.MedicineCases')</option>
                    <option value="{{URL::to('/others')}}"> @lang('validation.OtherCases')</option>
                    <option value="{{URL::to('/periodicCases')}}"> Periodic Cases</option>
                  </select>
                @endif
               </div>
          </div>
          @yield('header')
        </section>

        <!-- Main content -->
               
        <div class="container" style="width: 900px;">
          
          @yield('content')
        </div>
      <!-- /.content-wrapper -->
      </div>
       <div class="control-sidebar-bg"></div>
    </div>

      <!-- /.container -->

      <!-- <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
 -->
      <!-- Control Sidebar -->
  


  <script type="text/javascript" src="{{ URL::asset('Admin/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>

  
    <!-- Bootstrap 3.3.5 -->
     <script src="/Admin/bootstrap/js/bootstrap.min.js"></script>
  
  <!-- AdminLTE App -->
    <script src="/Admin/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   
    <!-- AdminLTE for demo purposes -->
    <script src="/Admin/dist/js/demo.js"></script>    
    
</body>
</html>

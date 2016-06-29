<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title>@lang('validation.sadaka')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootsrap -->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

        <!-- Font awesome -->
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

        <!-- Template main Css -->
        <link rel="stylesheet" href="/assets/css/style.css">
        
        <!-- Modernizr -->
        <script src="/assets/js/modernizr-2.6.2.min.js"></script>
    <style >
        label{

            font-size: 20px;
            color: #005384;
        }

        span{

            font-size: 22px;
            color: #005384;
        }
        .mainfooter{
            width:1500px;
            margin-left:-150px;
        }
        #mycase{
            height:30px;
            width:260px;
        }
        #mycomp span{
            font-size: 30px;
            color:white;
        }
        #xx{
            width:261px;
            height:200px;
        }
        .btn {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }
    #table td{
        padding-right: 448px;
        padding-bottom: 64px;
    }

    </style>


    </head>
    <body>
    <!-- NAVBAR
    ================================================== -->

    <header class="main-header">
        
    
        <nav class="navbar navbar-static-top">

            <div class="navbar-top">

              <div class="container">
                  <div class="row">


                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+201 124 372 854</a> </li>
                            <li> <i class="fa fa-envelope"></i> <a href="mailto:sadakateam@gmail.com">sadakateam@gmail.com</a> </li>
                        </ul>  <!-- /.header-contact  -->
                      
                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">

                            <li> <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="http://www.twitter.com" target="_blank"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="http://www.google.com" target="_blank"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="http://www.youtube.com" target="_blank"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="http://www.pinterest.com" target="_blank"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>

                            
                       </ul> <!-- /.header-social  -->
                      
                    </div>


                  </div>
              </div>

            </div>

            <div class="navbar-main">
              
              <div class="container">

                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                  </button>
                  
                  <a class="navbar-brand" href="{{URL::to('/')}}"><img src="/assets/images/sadaka-logo.png" alt=""></a>
                  
                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                    <ul class="nav navbar-nav">

                        <li><a  href="{{URL::to('/')}}">@lang('validation.home')</a></li>
                        <li><a href="#contact">@lang('validation.contact')</a></li>
                        <li class="has-child"><a href="{{URL::to('/cases')}}">@lang('validation.cases')</a>

                            <ul class="submenu">
                                <li class="submenu-item"><a href="{{URL::to('/cases')}}">@lang('validation.AllCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/money')}}">@lang('validation.MoneyCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/bloods')}}">@lang('validation.BloodCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/medicines')}}">@lang('validation.MedicineCases') </a></li>
                            </ul>


                        </li>
                        <li><a href="{{URL::to('/comp')}}">@lang('validation.compaigns')</a></li>
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">@lang('validation.login') / @lang('validation.register')</a></li>
                        @elseif(Auth::user()->user_type_id == 2)
                         <li><a href="{{ route('user_infos.show',Auth::user()->charity->id )}}" >PROFILE</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('validation.logout')</a></li> </ul> </li>
                        @else <li><a href="{{ route('user_infos.show',Auth::user()->userInfo->id )}}" >@lang('validation.profile')</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('validation.logout')</a></li> </ul> </li> @endif

                        <li class="dropdown">
                             <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @lang('validation.'. Config::get('languages')[App::getLocale()]) 

                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                <li>
                                    <a href="{{ route('lang.switch', $lang) }}">@lang('validation.'.$language)</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>

                    </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->


  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">@lang('validation.sadaka') <span class="title-under"></span></h1>
      <p class="page-description">
       @lang('validation.slug')
      </p>
      
    </div>

  </div>

       
        @yield('content')


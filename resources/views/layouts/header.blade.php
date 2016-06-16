<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>All Cases | Charity / Non-profit responsive Bootstrap HTML5 template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">


    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- PrettyPhoto -->
    <link rel="stylesheet" href="assets/css/prettyPhoto.css">

    <!-- Template main Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Modernizr -->
    <script src="assets/js/modernizr-2.6.2.min.js"></script>


    <style>

        lable{

            font-size: 20px;
            color: #005384;
        }

        span{

            font-size: 22px;
            color: #005384;
        }
        #mycase{
            height:195px;
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
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+212 658 986 213 </a> </li>
                            <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@sadaka.org">contact@sadaka.org</a> </li>
                        </ul> <!-- /.header-contact  -->

                    </div>

                    <div class="col-sm-6 col-xs-12 text-right">

                        <ul class="list-unstyled list-inline header-social">

                            <li> <a href="http://www.facebook.com" target="_blank"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="http://www.twitter.com" target="_blank"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="http://www.google.com" target="_blank"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="http://www.youtube.com" target="_blank"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="http://www.pinterest.com" target="_blank"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>

                       </ul>  <!-- /.header-social  -->

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

                    <a class="navbar-brand" href="{{URL::to('/')}}"><img src="assets/images/sadaka-logo.png" alt=""></a>

                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                    <ul class="nav navbar-nav">

                        <li><a  href="{{URL::to('/')}}">HOME</a></li>
                        <li><a href="#contact">CONTACT</a></li>
                        <li class="has-child"><a  href="{{URL::to('/cases')}}">CASES</a>

                            <ul class="submenu">
                                <li class="submenu-item"><a href="{{URL::to('/cases')}}">Cases list </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/money')}}">Mony Cases </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/bloods')}}">Blood Cases </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/medicines')}}">Medicine Cases </a></li>
                            </ul>


                        </li>
                        <li><a href="{{URL::to('/comp')}}">COMPAIGNS</a></li>
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">LOGIN / REGISTER</a></li>  @else <li><a href="{{ route('user_infos.show',Auth::user()->userInfo->id ) }}" >PROFILE</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>logout</a></li> </ul> </li> @endif


                    </ul>

                </div> <!-- /#navbar -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar-main -->


    </nav>

</header> <!-- /. main-header -->
       
        @yield('content')


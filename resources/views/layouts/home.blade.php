<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>@lang('validation.sadaka')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootsrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">

    <!-- Template main Css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Modernizr -->
    <script src="assets/js/modernizr-2.6.2.min.js"></script>
    <style>

        label{

            font-size:23px;
            color: #005384;
            width:120px;
        }
        .btn {
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 6px;
    }

        span{

            font-size: 15px;
            color: #005384;
        }
        #p {
           font-size: 25px;
           font-family:tahoma; 
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
        #compimage{
            height:500px;
        }

    </style>


</head>

<body>


<header class="main-header">


    <nav class="navbar navbar-static-top">

        <div class="navbar-top">

            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+201 124 372 854</a> </li>
                            <li> <i class="fa fa-envelope"></i> <a href="mailto:sadakateam@gmail.com">sadakateam@gmail.com</a> </li>
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

                        <li><a  href="{{URL::to('/')}}">@lang('validation.home')</a></li>
                        <li><a href="#contact">@lang('validation.contact')</a></li>
                        <li class="has-child"><a  href="{{URL::to('/cases')}}">@lang('validation.cases')</a>

                            <ul class="submenu">
                                <li class="submenu-item"><a href="{{URL::to('/cases')}}">@lang('validation.AllCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/money')}}"> </a>@lang('validation.MoneyCases')</li>
                                <li class="submenu-item"><a href="{{URL::to('/bloods')}}">@lang('validation.BloodCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/medicines')}}">@lang('validation.MedicineCases') </a></li>
                            </ul>


                        </li>
                        <li><a href="{{URL::to('/comp')}}">@lang('validation.compaigns')</a></li>
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">@lang('validation.login') / @lang('validation.register')</a></li>  @else <li><a href="{{ route('user_infos.show',Auth::user()->userInfo->id ) }}" >@lang('validation.profile')</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('validation.logout')</a></li> </ul> </li> @endif


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

<div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">

        <div class="item active">

            <img src="assets/images/slider/home-slider-1.jpg" alt="">

            <div class="container">

                <div class="carousel-caption">

                    <h2 class="carousel-title bounceInDown animated slow">Because they need your help</h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow ">Do not let them down</h4>

                </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->


        <div class="item ">

            <img src="assets/images/slider/home-slider-2.jpg" alt="">

            <div class="container">

                <div class="carousel-caption">

                    <h2 class="carousel-title bounceInDown animated slow">Together we can improve their lives</h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow"> So let's do it !</h4>

                </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->




        <div class="item ">

            <img src="assets/images/slider/home-slider-3.jpg" alt="">

            <div class="container">

                <div class="carousel-caption">

                    <h2 class="carousel-title bounceInDown animated slow" >A penny is a lot of money, if you have not got a penny.</h2>
                    <h4 class="carousel-subtitle bounceInUp animated slow">You can make the diffrence !</h4>

                </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->

    </div>

    <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div><!-- /.carousel -->

<div class="section-home home-reasons">

    <div class="container">

        <div class="row">
            @foreach($compaigns as $comp)
                <?php $id=$comp->id;
                $img=$comp->image;
                ?>
            <div class="col-md-6">
                <div class="reasons-col animate-onscroll fadeIn">

                    <img id="compimage" src="{{ asset("compagin/$img") }}"alt="xxx">

                    <div class="reasons-titles">

                        <h2 class="cause-title" style='text-transform:uppercase'><a href="{{ route('compaigns.show',$id) }}"><h1> {{ $comp->title }}</h1></a></h2>


                    </div>

                    <div class="on-hover hidden-xs" id="mycomp">

                        <label>Budget: </label> <span>{{ $comp->budget}} .LE</span><br/>
                        <label>Location: </label><span> {{ $comp->location }}</span><br/></br>
                        <p id="p"> {{ $comp->description}}</p><br/>

                    </div>
                </div>

            </div>

            @endforeach

        </div>

    </div>


</div> <!-- /.home-reasons -->
 @yield('content')
  </div><!-- /.container -->

    <footer class="main-footer">

        <div class="footer-top">
            
        </div>


        <div class="footer-main">
            <div class="container">
                
                <div class="row">
                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">@lang('validation.aboutus') <span class="title-under"></span></h4>

                            <div class="footer-content">
                                <p>
                                    <strong>Sadaka</strong> ipsum dolor sit amet, consectetur adipiscing elit. Ut at eros rutrum turpis viverra elementum semper quis ex. Donec lorem nulla, aliquam quis neque vel, maximus lacinia urna.
                                </p> 

                                <p>
                                    ILorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at eros rutrum turpis viverra elementum semper quis ex. Donec lorem nulla, aliquam quis neque vel, maximus lacinia urna.
                                </p>

                            </div>
                            
                        </div>

                    </div>

                    <div class="col-md-8">

                        <div class="footer-col">

                            <h4 id="contact" class="footer-title">@lang('validation.contact') <span class="title-under"></span></h4>

                            <div class="footer-content">

                                <div class="footer-form" >
                                    
                                    <form action="php/mail.php" class="ajax-form">

                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>

                                         <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                                        </div>

                                        <div class="form-group alerts">
                        
                                            <div class="alert alert-success" role="alert">
                                              
                                            </div>

                                            <div class="alert alert-danger" role="alert">
                                              
                                            </div>
                                            
                                        </div>

                                         <div class="form-group">
                                            <button type="submit" class="btn btn-submit pull-right">Send message</button>
                                        </div>
                                        
                                    </form>

                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div class="clearfix"></div>



                </div>
                
                
            </div>

            
        </div>

        <div class="footer-bottom">

            <div class="container text-right">
                Sadaka @ copyrights 2015 - by <a href="mailto:sadakateam@gmail.com">sadakateam@gmail.com</a>
            </div>
        </div>
        
    </footer>




       
        
        <!-- jQuery -->
        <script src="/Admin/jquery-1.11.3.min.js"></script>
        <script>window.jQuery || document.write('<script src="/assets/js/jquery-1.11.1.min.js"><\/script>')</script>

        <!-- Bootsrap javascript file -->
        <script src="/assets/js/bootstrap.min.js"></script>


        <!-- Template main javascript -->
        <script src="/assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>

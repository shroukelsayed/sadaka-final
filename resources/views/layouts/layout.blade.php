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
                                <li class="submenu-item"><a href="{{URL::to('/cases')}}">
                                @lang('validation.AllCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/bloods')}}">@lang('validation.BloodCases') </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/money')}}">
                                @lang('validation.MoneyCases')</a></li>
                                <li class="submenu-item"><a href="{{URL::to('/medicines')}}">
                                @lang('validation.MedicineCases')</a></li>
                                <li class="submenu-item"><a href="{{URL::to('/others')}}">
                                @lang('validation.OtherCases')</a></li>
                            </ul>
                        </li>
                        <li><a href="{{URL::to('/comp')}}">@lang('validation.compaigns')</a></li>
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">
                        @lang('validation.login') / @lang('validation.register')
                        </a></li>
                        @elseif(Auth::user()->user_type_id == 2)
                         <li><a href="{{ route('user_infos.show',Auth::user()->charity->id )}}" >PROFILE</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('validation.logout')</a></li> </ul> </li>
                        @else <li><a href="{{ route('user_infos.show',Auth::user()->userInfo->id )}}" >PROFILE</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>@lang('validation.logout')</a></li> </ul> </li> @endif


                    </ul>

                </div> <!-- /#navbar -->

              </div> <!-- /.container -->
              
            </div> <!-- /.navbar-main -->


        </nav> 

    </header> <!-- /. main-header -->


  <div class="page-heading text-center">

    <div class="container zoomIn animated">
      
      <h1 class="page-title">@lang('validation.sadaka')<span class="title-under"></span></h1>
      <p class="page-description">
       @lang('validation.slug')
      </p>
      
    </div>

  </div>

    <div class="container">
        @yield('header')
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

                            <h4 class="footer-title">About us <span class="title-under"></span></h4>

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

                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">LAST TWEETS <span class="title-under"></span></h4>

                            <div class="footer-content">
                                <ul class="tweets list-unstyled">
                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                    <li class="tweet"> 

                                        20 Surprise Eggs, Kinder Surprise Cars 2 Thomas Spongebob Disney Pixar  http://t.co/fTSazikPd4 

                                    </li>

                                </ul>
                            </div>
                            
                        </div>

                    </div>


                    <div class="col-md-4">

                        <div class="footer-col">

                            <h4 id="contact" class="footer-title">Contact us <span class="title-under"></span></h4>

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
                Sadaka @ copyrights 2015 - by <a href="http://www.ouarmedia.com" target="_blank">Ouarmedia</a>
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

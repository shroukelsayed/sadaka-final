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

        lable{

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
            height:195px;
        }
        #mycomp span{
            font-size: 30px;
            color:white;
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
                        
                        <li><a  href="{{URL::to('/')}}">@lang('validation.home')</a></li>
                        <li><a href="#contact">@lang('validation.contact')</a></li>
                        <li class="has-child"><a  href="{{URL::to('/cases')}}">@lang('validation.cases')</a>

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
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">@lang('validation.login') / @lang('validation.register')</a></li>  @else <li><a href="{{ route('user_infos.show',Auth::user()->userInfo->id ) }}" >@lang('validation.profile')</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>logout</a></li> </ul> </li> @endif
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
                <?php $id=$comp->id;?>
            <div class="col-md-6">

                <div class="reasons-col animate-onscroll fadeIn">

                    <img src="assets/images/reasons/we-fight-togother.jpg" alt="">

                    <div class="reasons-titles">

                        <h2 class="cause-title" style='text-transform:uppercase'><a href="{{ route('compaigns.show',$id) }}"><h1> {{ $comp->title }}</h1></a></h2>


                    </div>

                    <div class="on-hover hidden-xs" id="mycomp">

                        <label>@lang('validation.budget') </label> <span>{{ $comp->budget}} .LE</span><br/>
                        <label>@lang('validation.location') </label><span> {{ $comp->location }}</span><br/>
                        <label>@lang('validation.description') </label><span> {{ $comp->description}}</span><br/>

                    </div>
                </div>

            </div>

            @endforeach

        </div>

    </div>


</div> <!-- /.home-reasons -->
 @yield('content')
<footer class="main-footer">

    <div class="footer-top">

    </div>


    <div class="footer-main">
        <div class="container">

            <div class="row">
                <div class="col-md-4">

                    <div class="footer-col">

                        <h4 class="footer-title">@lang('validation.aboutus')<span class="title-under"></span></h4>

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
    </div>

    <div class="footer-bottom">

        <div class="container text-right">
            Sadaka @ copyrights 2015 - by <a href="#" target="_blank">Ouarmedia</a>
        </div>
    </div>

</footer>


<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">@lang('validation.donatenow')</h4>
            </div>
            <div class="modal-body">
               
                <form class="form-donation" action="{{ route('userpeople.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                     

                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>

                    <div class="row">

                        <div class="form-group col-md-12 ">

                        @foreach($people as $person_info)
                        <?php $donation=$p->donationType->id; ?>
                        <?php
                        if($person_info)
                        {
                        echo "<input type='hidden' name='id' value='$case_id '>";
                        ?>
                            <?php
                                    if ($donation == 1)
                                    {
                                        echo '<input type="text" class="form-control" name="amount"  id="amount" placeholder="NUMBER OF BLOOD BAGES:-">';
                                    }
                                    elseif ($donation == 2){
                                       echo '<input type="text" class="form-control" name="amount"  id="amount" placeholder="AMOUNT OF MONEY:-">';
                                    }
                                    elseif ($donation == 3)
                                    {
                                        echo '<input type="text" class="form-control" name="amount"  id="amount" placeholder="NUMBER OF PACKETS OR AMOUNT OF MONEY:-">';
                                    }

                             } ?>
                        

                        @endforeach
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <input type="date" class="form-control" name="date" placeholder="DATE">
                        </div>

                    </div>


                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" name="donateNow" >@lang('validation.donatenow')</button>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div><!-- /.modal -->
<div class="modal fade" id="donateModel" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">@lang('validation.donatenow')</h4>
            </div>
            <div class="modal-body">

                @foreach($compaigns as $comp)
                <form class="form-donation" action="{{ route('usercompaign.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <?php
                    if($comp)
                    echo "<input type='hidden' name='id' value='$id '>";
                    ?>

                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>
                    <div class="row">
                        <div class="form-group col-md-12" >
                            <label for="amount">SHARE TYPES </label>
                            <select name="type" id="sharetype">

                                    <option value="1">SHARE</option>
                                    <option value="2">DONATE</option>
                                    <option value="3">SHARE AND DONATE</option>

                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12 " style="height:200px;" id="wel">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" name="donateNow" >@lang('validation.donatenow')</button>
                        </div>

                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>

</div> <!-- /.modal -->

<!--  Scripts
================================================== -->

<!-- jQuery -->
<script src="/Admin/jquery-1.11.3.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- owl carouseljavascript file -->
<script src="assets/js/owl.carousel.min.js"></script>

<!-- Template main javascript -->
<script src="assets/js/main.js"></script>

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


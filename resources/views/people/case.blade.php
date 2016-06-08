<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>All Cases | Charity / Non-profit responsive Bootstrap HTML5 template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,700' rel='stylesheet' type='text/css'>

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

                            <li> <a href="#" target="_blank"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#" target="_blank"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>

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

                    <a class="navbar-brand" href="index.html"><img src="assets/images/sadaka-logo.png" alt=""></a>

                </div>

                <div id="navbar" class="navbar-collapse collapse pull-right">

                    <ul class="nav navbar-nav">

                        <li><a class="is-active" href="{{URL::to('/home')}}">HOME</a></li>
                        <li><a href="contact.html">CONTACT</a></li>
                        <li class="has-child"><a class="is-active" href="{{URL::to('/cases')}}">CASES</a>

                            <ul class="submenu">
                                <li class="submenu-item"><a href="{{URL::to('/cases')}}">Cases list </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/money')}}">Mony Cases </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/bloods')}}">Blood Cases </a></li>
                                <li class="submenu-item"><a href="{{URL::to('/medicines')}}">Medicine Cases </a></li>
                            </ul>


                        </li>
                        <li><a href="{{URL::to('/comp')}}">COMPAIGNS</a></li>
                   

                        @if (Auth::guest()) <li><a href="{{ url('/login') }}">LOGIN</a></li>  @else <li><a href="{{ route('user_infos.show',Auth::user()->id) }}" >PROFILE</a></li><li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span> </a> <ul class="dropdown-menu" role="menu"> <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>logout</a></li> </ul> </li> @endif


                    </ul>

                </div> <!-- /#navbar -->

            </div> <!-- /.container -->

        </div> <!-- /.navbar-main -->


    </nav>

</header> <!-- /. main-header -->


<div class="page-heading text-center">

    <div class="container zoomIn animated">

        <h1 class="page-title">OUR CASES <span class="title-under"></span></h1>
        <p class="page-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
        </p>

    </div>

</div>

<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">
        <div class="row">
        @foreach($people as $person_info)

                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <div class="progress cause-progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                10$ / 500$
                            </div>
                        </div>
                        @foreach ($person_info->people as $p)
                            <?php $donation=$p->donationType->id; ?>
                            <h2 class="cause-title" style='text-transform:uppercase'><a href="#"><h1> {{ $p->donationType->type }}</h1></a></h2>
                            <div class="cause-details">
                               <label>NAME: </label> <span>{{ $person_info->name}}</span><br/>
                                <label>ADDRESS: </label><span> {{ $person_info->address }}</span><br/>
				<label>CHARITY: </label><span> {{ $p->user->name }}</span><br/>
                                @if ($donation === 1)
                                    <label>BLOOD TYPE: </label><span> {{ $p->blood->bloodtype }}</span><br/>
                                    <label>NUMBER OF BAGS: </label><span> {{ $p->blood->amount }}  bags</span><br/>
                                @elseif ($donation === 2)
                                    <label>AMOUNT OF MONEY: </label><span>{{ $p->money->amount }} LE</span><br/>
                                @elseif ($donation === 3)
                                    <label>NUMBER OF PACKETS: </label><span>{{ $p->medicine->amount }} packets</span><br/>

                                @endif
                                <label>TYPE: </label><span> {{ $p->intervaltype->type }}</span><br/>

                                <?php $case_id=$p->id;?>
                            </div>

                            <div class="btn-holder text-center">

                                @if (Auth::guest())
                                    <a href="{{ url('/login') }}" class="btn btn-primary" > DONATE NOW</a>

                                @else


                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donateModal"> DONATE NOW</a>
					<?php $b= $p->blood->id?>
					@if ($donation===1)
					<a class="is-active" href="{{ route('bloods.show',$b) }}">see more</a>
					@elseif ($donation===2)
						<a class="is-active" href="{{ route('money.show',$b) }}">see more</a>
					@elseif ($donation === 3)
						<a class="is-active" href="{{ route('medicines.show',$b) }}">see more</a>
					@else
						<a class="is-active" href="{{ route('others.show',$b) }}">see more</a>
					@endif
                                    
                                @endif

                            </div>
                    </div> <!-- /.cause -->
                </div>
        @endforeach
        @endforeach
        </div>
    </div>

</div>

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

                        <h4 class="footer-title">Contact us <span class="title-under"></span></h4>

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


<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">DONATE NOW</h4>
            </div>
            <div class="modal-body">

                <form class="form-donation" action="{{ route('userpeople.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <?php
                    if($people)
                        echo "<input type='hidden' name='id' value=' $case_id '>";
                    ?>

                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            @if ($donation === 1)
                                <input type="text" class="form-control" name="amount"  id="amount" placeholder="NUMBER OF BLOOD BAGES:-">
                            @elseif ($donation === 2)
                                <input type="text" class="form-control" name="amount"  id="amount" placeholder="AMOUNT OF MONEY:-">
                            @elseif ($donation === 3)
                                <input type="text" class="form-control" name="amount"  id="amount" placeholder="NUMBER OF PACKETS OR AMOUNT OF MONY:-">


                            @endif
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <input type="date" class="form-control" name="date" placeholder="DATE">
                        </div>

                    </div>


                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" name="donateNow" >DONATE NOW</button>
                        </div>

                    </div>





                </form>

            </div>
        </div>
    </div>

</div> <!-- /.modal -->







<!-- jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- PrettyPhoto javascript file -->
<script src="assets/js/jquery.prettyPhoto.js"></script>



<!-- Google map  -->
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>


<!-- Template main javascript -->
<script src="assets/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
</body>
</html>

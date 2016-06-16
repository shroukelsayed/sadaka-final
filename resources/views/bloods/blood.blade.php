@extends('layouts.header')
@section('content')
<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">

        <h2 class="title-style-1">BLOOD CASES <span class="title-under"></span></h2>
        <div class="row">
            @if($bloods->count())
                @foreach($bloods as $one)


                <div class="col-md-3 col-sm-6">

                    <div class="cause">
            
                        <div class="progress cause-progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                10$ / 500$
             </div>
                        </div>

                            <h4 class="cause-title" style='text-transform:uppercase'>


                                            <a class="is-active" href="{{ route('bloods.show',$one->id) }}"><h1>{{$one->person->personInfo->name}}</h1></a></h4>              
                            
                            <div class="cause-details" id="mycase">
                                <label>ADDRESS: </label><span> {{ $one->person->personInfo->address }}</span><br/>
                                <label>CHARITY: </label><span> {{ $one->person->user->name }}</span><br/>
                                <label>BLOODTYPE: </label><span>{{ $one->bloodtype }}</span><br/>
                                <label>AMOUNT: </label><span>{{ $one->amount }}</span><br/>
                                <label>HOSPITAL: </label><span>{{ $one->hospital }}</span><br/>
                                <label>INTERVAL TYPE: </label><span> {{ $one->person->intervaltype->type }}</span><br/>


                            </div>

                            <div class="btn-holder text-center">

                                @if (Auth::guest())
                                    <a href="{{ url('/login') }}" class="btn btn-primary" > DONATE NOW</a>

                                @else


                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donateModal"> DONATE NOW</a>
                                    
                                @endif

                            </div>

                    </div>
    </div>

@endforeach
@endif
</div>

</div>             </div>

</div>

</div> <!-- /.our-causes -->




</div> <!-- /.main-container  -->





<!-- /.main-container  -->
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

                        <h4 id="contact" class="footer-title">Contact us <span class="title-under"></span></h4>pan></h4>

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
                     

                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            @if($bloods->count())
                                @foreach($bloods as $one)
                                    <?php $case_id= $one->person->id;
                                    echo "<input type='hidden' name='id' value='$case_id '>";
                                    ?>
                                @endforeach
                                    <input type="text" class="form-control" name="amount"  id="amount" placeholder="NUMBER OF BLOOD BAGS:-">
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

</div>

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
@endsection



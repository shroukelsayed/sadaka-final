@extends('layouts.header')
@section('content')

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

                                    @if ($donation===1)
                                        <?php $b= $p->blood->id?>
                                        <h4 class="cause-title" style='text-transform:uppercase'><a href="{{ route('bloods.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                    @elseif ($donation===2)
                                        <?php $b= $p->money->id?>
                                        <h4 class="cause-title" style='text-transform:uppercase'><a href="{{ route('money.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                    @elseif ($donation === 3)
                                        <?php $b= $p->medicine->id?>
                                        <h4 class="cause-title" style='text-transform:uppercase'><a href="{{ route('medicines.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                    @else
                                        <?php $b= $p->other->id?>
                                        <h4 class="cause-title" style='text-transform:uppercase'><a href="{{ route('others.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                    @endif

                            
                            <div class="cause-details" id="mycase">
                                <label>NAME: </label> <span>{{ $person_info->name}}</span><br/>
                                <label>ADDRESS: </label><span> {{ $person_info->address }}</span><br/>
                <label>CHARITY: </label><span> {{ $p->user->name }}</span><br/>
                                @if ($donation === 2)
                                    <label>AMOUNT OF MONEY: </label><span>{{ $p->money->amount }} LE</span><br/>
                                @elseif ($donation === 1)
                                    <label>BLOOD TYPE: </label><span> {{ $p->blood->bloodtype }}</span><br/>
                                    <label>NUMBER OF BAGS: </label><span> {{ $p->blood->amount }}  bags</span><br/>
                                @elseif ($donation === 3)
                                    <label>NUMBER OF PACKETS: </label><span>{{ $p->medicine->amount }} packets</span><br/>

                                @endif

                                <?php $case_id=$p->id;?>

                                <label>INTERVAL TYPE: </label><span> {{ $p->intervaltype->type }}</span><br/>

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
        @endforeach
    </div>

</div>             

</div>

</div> <!-- /.our-causes -->




</div> <!-- /.main-container  -->

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
                     @foreach($people as $person_info)
                    <?php
                    if($person_info)
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
                        @endforeach
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
<script src="/Admin/jquery-1.11.3.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/jquery-1.11.1.min.js"><\/script>')</script>

<!-- Bootsrap javascript file -->
<script src="assets/js/bootstrap.min.js"></script>

<!-- PrettyPhoto javascript file -->
<script src="assets/js/jquery.prettyPhoto.js"></script>

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
@endsection

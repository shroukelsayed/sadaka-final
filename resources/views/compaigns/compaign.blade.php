@extends('layouts.header')
@section('content')


<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">
        <div class="row">
        @foreach($comps as $comp)
            <?php $id=$comp->id;
            $img=$comp->image;
                ?>
                <div class="col-md-3 col-sm-6">
                    <div class="cause"id="content">
                         <img id="xx" src="{{ asset("compagin/$img") }}"alt="xxx">
                            <h3 class="cause-title" ><a href="{{ route('compaigns.show',$id) }}"><h3> {{ $comp->title }}</h3></a></h2>
                                <div class="cause-details" id="mycase">
                                                <p><h4> {{$comp->description}}</h4></p>
                                </div>

                            <div  class="btn-holder text-center" id="btn">

                                @if (Auth::guest())
                                    <a href="{{ url('/login') }}" style="background-color: #5bc0de;"class="btn btn-primary mybtn">SHARE </a>

                                @else


                                    <a href="#"  style="background-color: #5bc0de;"class="btn btn-primary mybtn" data-toggle="modal" data-target="#donateModal"> SHARE</a>
                                    
                                @endif

                            </div>



                    </div> <!-- /.cause -->

                </div>
        @endforeach
        </div>
        {{--@endforeach--}}
    </div>

</div>             </div>

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

                        <h4 id="contact" class="footer-title">@lang('validation.contact') <span class="title-under"></span></h4></h4>

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


<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">DONATE NOW</h4>
            </div>
            <div class="modal-body">

                @foreach($comps as $comp)
                <form class="form-donation" action="{{ route('usercompaign.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <?php
                    if($comp)
                    echo "<input type='hidden' name='id' value='$id '>";
                    ?>
                @endforeach    
                    <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>
                    <div class="row">
                        <div class="form-group col-md-12" >
                            <label for="amount">SHARE TYPES </label>
                            <select name="type" id="sharetype">

                                    <option value="1">Volunteer</option>
                                    <option value="2">Donate</option>
                                    <option value="3">Volunteer & Donate</option>

                            </select>
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12 " id="wel">
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


<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>
<script>
    $(document).ready(function () {
        $("#sharetype").on("change", function () {

            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            var field;
            field = "<input type='text' class='form-control' name='amount' id='aa' placeholder='AMOUNT(€)'>";
            if (valueSelected == 2) {
              
                var amountDiv = document.getElementById("wel");
               
                var f = "<label>AMOUNT(€)</label><input type='text' class='form-control' name='amount' required id='aa' />";
                amountDiv.innerHTML =f;
            }
           else if (valueSelected == 3) {
               var amountDiv = document.getElementById("wel");
               amountDiv.innerHTML = "<label>AMOUNT(€)</label><input type='text' class='form-control' name='amount' required id='aa' />";
           }

        });

    });
</script>
</body>
</html>
@endsection

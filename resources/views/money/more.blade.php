@extends('layouts.layout')
@section('header')

<link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />

<style>

a.fancybox img {
    border: none;
    box-shadow: 0 1px 7px rgba(0,0,0,0.6);
    -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
} 
a.fancybox:hover img {
    position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
}
label{

        font-size: 15px;
        color: #005384;
    }
#case{
    width:350px;
    height:60px;
}
#imgdosc{

    width: 100%;
    overflow: hidden;
    margin: 10px 0px;
    border: 1px dashed #DDD;
    height: 400px;
    }
 .payments-bar {
    background: none repeat scroll 0% 0% #31B0D5;
    height: 40px;
    color: #FFF;
    font-size: 15px;
}
#bb{
    margin-left:150px;
}
#data{
    height:70px;
}
</style>
@endsection
@section('content')

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
        $("#type").on("change", function () {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            var field;
            field = "<input type='text' class='form-control' name='amount' id='aa' placeholder='AMOUNT(€)'>";
            if (valueSelected ==1) {
             <?php $credit="$money->person->user->charity->credit";?>
                var amountDiv = document.getElementById("wel");
                amountDiv.innerHTML ='<p><label>OUR BANK ACCOUNT:</label> '+document.getElementById("credit").value +'</p></br><label>AMOUNT OF MONEY(€)</label><input type="text" class="form-control" name="aa" id="we" /></br><label>DATE</label><input type="date" class="form-control" name="date"/>';
            }
           else if (valueSelected == 2) {
               var amountDiv = document.getElementById("wel");
               amountDiv.innerHTML = 
               "<label>AMOUNT OF MONEY(€)</label><input type='text' class='form-control' name='aa' id='aa' />";
           }

        });

    });
    $.noConflict();
</script>

        <div class="row">

            <div class="col-sm-6 right-section">
                    @foreach($money->person->personDocs as $doc)
                        <?php $img=$doc->document;?>
                    @endforeach
                        <a>
                        <br>
                        <img id="imgdosc" class="fancybox" src="{{ asset("Case/PersonDocument/money/$img") }}" alt="$doc->document" />
                        <br>
                        </a>                    
            </div>
            <div class="col-sm-6 left-section">
                <div class="box-footer no-padding">
                    <div class="box box-widget widget-user-2">
                        <h2 style="font-family:tahoma; "class="widget-user-username"  >{{$money->person->title}}</h2>
                        <div id="data">
                            <h4 class=""  ><p style="font-family:tahoma; ">{{$money->person->desc}}</p></h4> 
                        </div>    
                    </div>
                        <h2 class="form-control-static" style="font-family:tahoma; "> needed amount</h2>
                        <h1 style=" font-size:50px; font-family:tahoma; " class="form-control-static">{{$money->amount}} .LE</h1>

                    <div class="payments-bar">
                        <div class="amount-paid-bar" style="width:80%">
                            <p style="font-family:tahoma ; margin-left:30px;" > paied :{{ $money->paid}}</p>
                         </div>
                    </div>
             <div class="container" style="margin-top: 20px;"> 
                    @if (Auth::guest())
                        <a  class="btn btn-info btn-lg"  href="{{ url('/login') }}" > Donate Now</a>
                    @else
                        <button id="bb" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Donate Now</button>
                    @endif
                 <div class="modal fade" id="myModal" role="dialog">
                  <div class="modal-dialog"> <!-- Modal content--> 
                  <div class="modal-content"> 
                  <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal">&times;</button> 
                   <h4 class="modal-title">DONATE NOW</h4> </div> 
                   <div class="modal-body"> 
                       <form class="form-donation" action="{{ route('userpeople.store') }}" method="POST">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                         

                        <h3 class="title-style-1 text-center">Thank you for your donation <span class="title-under"></span>  </h3>

                                @if($money->person->user->user_type_id==2)
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                        <label for="amount">Payment Types </label>
                                        <select name="type" id="type" style="width:30%">
                                                <option value="2">OTHER</option>
                                                <option value="1">CREDIT</option>
                                        </select>
                                        <input type='hidden' name='' id='credit' value='{{ $money->person->user->charity->credit}}'/>
                                        <input type='hidden' name='payment' value='1'/>
                                        <input type='hidden' name='person' value="{{$money->person_id}}"/>
                                         
                                       </div>
                                    </div>
                                <div class="row">

                                    <div class="form-group col-md-12 " id="wel">
                                    </div>

                                </div>

                                @else
                                <div class="row">
                                    <div class="form-group col-md-12" >
                                        <p> <span>You Can Contact Us Through This Number :</span>
                                           {{$money->person->user->phone }} </br>
                                           <span>And This Email</span>
                                           {{$money->person->user->email}}
                                        </p>
                                        <input type='hidden' name='person' value="{{$money->person_id}}"/>
                                        <input type='hidden' name='payment' value='2'/>
                                        <input type='hidden' name='date' value='0'/>
                                        <input type="text" class="form-control" name='aa'  id="amount" placeholder="AMOUNT OF MONEY:-">
                                </div>
                                    </div>
                                    @endif
                            <div class="row">

                                 <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary pull-right" name="donateNow" >DONATE NOW</button>
                                    </div>

                            </div>  
         
                        </form>
                    </div> 
                   <div class="modal-footer"> 
                   </div> </div> </div> </div> </div>

                </div>
            </div>
        </div>
    </div>


@endsection


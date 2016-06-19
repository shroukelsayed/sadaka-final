@extends('layouts.adminlayout')


   <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>

    <script src="/Admin/vaild.js" type="text/javascript"></script>

    <style>
    	
    	#photo{

    		width:50px;
    		height:50px;
            padding:3px;
    	}

    	#donait{

    		margin-left:5px;
    		color:black;

    	}

		#cont:hover{

			background-color: lightgray;
    	}
    	#cont{

    		margin-top:10px;
    		background-color:#e8d7d7;
    		width:800px;
    		/* border: ridge;   */
    	}

    </style>
@section('header')
	

@endsection

@section('content')

	<h1 style="font-family: tahoma;">Your Notifications</h1>
	<br>
	@foreach($infos as $info)
		
		<a href="{{route('userpeople.show',$info->id)}}">
		<div class="container" id="cont">
		<img id="photo" src="{{ asset("img/3.png") }}" alt=""> 
		{{$info->user->name}}
		<span id="donait">has Donait to </span>
		{{$info->person->personInfo->name}}
		</div>
		</a>
		
	@endforeach	

    @foreach($comps as $comp)

        <a href="{{route('usercompaign.show',$info->id)}}">
        <div class="container" id="cont">
        <img id="photo" src="{{ asset("compagin/1.png") }}" alt=""> 
            {{$comp->compaign->title}} 
            <span id="donait">have new</span> 
            @if($comp->donate_type_id==1)
                Share

            @elseif($comp->donate_type_id==2)
                Donaite

            @else
              Share And Donaite

            @endif   

        </div>
        </a>


    @endforeach
@endsection
@extends('layouts.layout')
@section('content')
<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">

        <h2 class="title-style-1">ALL cases <span class="title-under"></span></h2>
        <div class="row">
        @if($people->count())
        @foreach($people as $p)
             <div class="col-md-3 col-sm-6">
                    <div class="cause" id="content" >
                        
                            <?php $donation=$p->donationType->id; ?>
                                       @if ($donation===1)
                                            @foreach($p->personDocs as $doc)
                                            <?php $img=$doc->document;?>
                                            @endforeach
                                            <img id="xx" src="{{ asset("Case/PersonDocument/blood/$img") }}" alt="$doc->document">
                                            <?php $b= $p->blood->id?>
                                            <h5 class="cause-title" >
                                            <a class="is-active" href="{{ route('bloods.show',$b) }}"><h3> {{ $p->title }}</h3></a></h5>
                                            <div class="cause-details" id="mycase">
                                                <p><h4> {{$p->desc}}</h4></p>
                                            </div>
                                            <div class="btn-holder text-center" id="btn">
                                                <a href="{{ route('bloods.show',$b) }}" class="btn btn-primary" > DONATE NOW</a>    
                                            </div>
                                        @elseif ($donation===2)
                                            @foreach($p->personDocs as $doc)
                                            <?php $img=$doc->document;?>
                                             @endforeach
                                            <img id="xx" src="{{ asset("Case/PersonDocument/money/$doc->document") }}" alt="$doc->document">
                                            <?php $b= $p->money->id?>
                                            <h5 class="cause-title" >
                                            <a class="is-active" href="{{ route('money.show',$b) }}"><h3> {{ $p->title }}</h3></a></h4>
                                                <div class="cause-details" id="mycase">
                                                    <p><h4> {{$p->desc}}</h4></p>
                                                </div>
                                                <div class="btn-holder text-center"id="btn">
                                                    <a href="{{ route('money.show',$b) }}" class="btn btn-primary" > DONATE NOW</a>   
                                                </div>
                                        @elseif ($donation === 3)
                                            @foreach($p->personDocs as $doc)
                
                                            <?php $img=$doc->document;?>
                                             @endforeach
                                            <img id="xx" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document">
                                            <?php $b= $p->medicine->id?>
                                            <h5 class="cause-title" >
                                            <a class="is-active" href="{{ route('medicines.show',$b) }}"><h3> {{ $p->title }}</h3></a></h4>
                                                <div class="cause-details" id="mycase">
                                                    <p><h4> {{$p->desc}}</h4></p>
                                                </div>
                                                <div class="btn-holder text-center" id="btn">
                                                    <a href="{{ route('medicines.show',$b) }}" class="btn btn-primary" > DONATE NOW</a>   
                                                </div>
                                        @else
                                            @foreach($p->personDocs as $doc)
                                                <?php $img=$doc->document;?>
                                            @endforeach
                                                <img id="xx" src="{{ asset("Case/PersonDocument/other/$doc->document") }}" alt="$doc->document">
                                                <?php $b= $p->other->id?>
                                                <h5 class="cause-title" >
                                                <a class="is-active" href="{{ route('others.show',$b) }}"><h3> {{ $p->title }}</h3></a></h4>
                                                    <div class="cause-details" id="mycase">
                                                        <p><h4> {{$p->desc}}</h4></p>
                                                    </div>
                                                    <div class="btn-holder text-center" id="btn">
                                                        <a href="{{ route('others.show',$b) }}" class="btn btn-primary" > DONATE NOW</a>   
                                                    </div>
                                        @endif               
                                        
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
@endsection




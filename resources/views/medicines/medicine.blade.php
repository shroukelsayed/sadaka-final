@extends('layouts.layout')
@section('content')
<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">

        <h2 class="title-style-1">MEDICINE CASES <span class="title-under"></span></h2>
        <div class="row">
            @if($medicines->count())
                @foreach($medicines as $one)
                <div class="col-md-3 col-sm-6">

                    <div class="cause">
                                @foreach($one->person->personDocs as $doc)
                                    <?php $img=$doc->document;?>
                                @endforeach
                                <img id="xx" src="{{ asset("Case/PersonDocument/medicine/$doc->document") }}" alt="$doc->document" />
                                <h4 class="cause-title" >
                                <a class="is-active" href="{{ route('medicines.show',$one->id) }}"><p><h3>{{$one->person->title}}</h3></p></a></h4></br>            
                            
                            <div class="cause-details" id="mycase">
                                <p><h4> {{$one->person->desc}}</h4></p>
                            </div>

                            <div class="btn-holder text-center">

                                <a href="{{ route('medicines.show',$one->id) }}" class="btn btn-info btn-lg" > DONATE</a>
                                    
                                

                            </div>

                    </div>
    </div>

@endforeach
@endif


</div>

</div> <!-- /.our-causes -->




</div> <!-- /.main-container  -->





@endsection



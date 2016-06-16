@extends('layouts.home')
@section('content')
<div class="section-home our-causes animate-onscroll fadeIn">

    <div class="container">

        <h2 class="title-style-1">@lang('validation.AllCases')<span class="title-under"></span></h2>
        <div class="row">
        @foreach($people as $person_info)
            <div class="col-md-3 col-sm-6">
                <div class="cause">
                    <div class="progress cause-progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                                10$ / 500$
                         </div>
                    </div>
                    @foreach ($person_info->people as $p)
                        <?php $donation=$p->donationType->id; ?>

                            <h4 class="cause-title" style='text-transform:uppercase'>
                                       @if ($donation===1)
                                            <?php $b= $p->blood->id?>
                                            <a class="is-active" href="{{ route('bloods.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                        @elseif ($donation===2)
                                            <?php $b= $p->money->id?>
                                            <a class="is-active" href="{{ route('money.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                        @elseif ($donation === 3)
                                            <?php $b= $p->medicine->id?>
                                            <a class="is-active" href="{{ route('medicines.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                        @else
                                            <?php $b= $p->other->id?>
                                            <a class="is-active" href="{{ route('others.show',$b) }}"><h1> {{ $p->donationType->type }}</h1></a></h4>
                                        @endif                

                            
                            <div class="cause-details" id="mycase">
                                <label>NAME: </label> <span>{{ $person_info->name}}</span><br/>
                                <label>ADDRESS: </label><span> {{ $person_info->address }}</span><br/>
                <label>CHARITY: </label><span> {{ $p->user->name }}</span><br/>
                                @if ($donation === 2)
                           
                                    <label>AMOUNT OF MONEY: </label><span>{{ $p->money->amount }} .LE</span><br/>
                                @elseif ($donation === 1)
                                    
                                    <label>BLOOD TYPE: </label><span> {{ $p->blood->bloodtype }}</span><br/>
                                    <label>NUMBER OF BAGS: </label><span> {{ $p->blood->amount }} </span><br/>
                                @elseif ($donation === 3)
                                   
                                    <label>NUMBER OF PACKETS: </label><span>{{ $p->medicine->amount }} </span><br/>

                                @endif

                                <?php $case_id=$p->id;?>

                                <label>INTERVAL TYPE: </label><span> {{ $p->intervaltype->type }}</span><br/>

                            </div>

                            <div class="btn-holder text-center">

                                @if (Auth::guest())
                                    <a href="{{ url('/login') }}" class="btn btn-primary" > @lang('validation.donatenow')</a>

                                @else
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#donateModal">@lang('validation.donatenow')</a>
                                    
                                @endif
                            </div>
                    </div>
    </div>
    @endforeach
@endforeach
</div>

</div>             </div>

</div>

</div> <!-- /.our-causes -->




</div> <!-- /.main-container  -->





<!-- /.main-container  -->
@endsection


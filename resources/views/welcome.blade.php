@extends(( (isset(Auth::user()->id)) and Auth::user()->user_type_id  == 2 or (isset(Auth::user()->id)) and Auth::user()->user_type_id  == 1 or ( isset(Auth::user()->id) and Auth::user()->user_type_id == 3 )) ? 'layouts.adminlayout' : 'layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9" style="margin-top: 50px;">
            <div class="panel panel-default">
                
                <div class="panel-heading" >Welcome</div>
                <div class="panel-body">
                    Your Application's Landing Page.
                    @lang('validation.sadaka')
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.adminlayout')

@section('header')
<div><br></div>    
    
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="/Admin/vaild.js" type="text/javascript"></script>
<script src="/Admin/vaildregister.js" type="text/javascript"></script>
   
@endsection
@section('content')
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12">
              <form action="{!! URL::to('change') !!}" method="POST">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
         		<fieldset style="border: 2px solid lightgray;padding: 20px;margin-bottom: 20px;">
                  <legend>Reset Password</legend>
                  	<div class="row" style="margin-bottom: 20px;">
                  		<div class="col-md-5 col-md-push-1">
                  			<label>Your Old Password : </label>
                  		</div>
                  		<div class="col-md-6">
                  			<input type="password" name="oldpassword" class="form-control"/>
                  		</div>
                  	</div>
                  	<div class="row" style="margin-bottom: 20px;">
                  		<div class="col-md-5 col-md-push-1">
                  			<label>New Password : </label>
                  		</div>
                  		<div class="col-md-6">
                  			<input type="password" id="password" name="password" class="form-control"/>
                  		</div>
                  	</div>
                  	<div class="row" style="margin-bottom: 20px;">
                  		<div class="col-md-5 col-md-push-1">
                  			<label>Confirm New Password : </label>
                  		</div>
                  		<div class="col-md-6">
                  			<input type="password" id="confirm_password" class="form-control"/>
                  		</div>
                  	</div>
	                   
	                <button type="submit" class="btn btn-primary pull-right" style="margin: 10px;">Reset Password</button>
	            </fieldset>
            </form>
    </div>
  </div>


@endsection
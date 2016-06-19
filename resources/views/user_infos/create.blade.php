@extends('layouts.layout')
@section('css')

@endsection
@section('header')
 
<script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="/Admin/jquery-ui.min.js" type="text/javascript"></script>
 <script src="/assets/js/user_validation.js"></script>
 <script src="/Admin/vaildregister.js"></script>
 
    <!-- <div class="page-header">
        <h3><i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i> Welcome</h3>
    </div> -->
     <script>

$(document).ready(function($) {

  $('#governorate').on('change',function(e){

    console.log(e);
    var governrate_id =e.target.value;

    //Ajax

  $.get('/ajax-governrate?governorate_id='+ governrate_id,function(data){
         $('#city').empty();
        console.log(data);
        $.each(data,function(index,cityobj){

          $('#city').append('<option value="'+cityobj.id+'">'+cityobj.name+'</option>');

          });
      });
  });

     
      $("#datetimepicker").keydown(function(event){
          event.preventDefault();          
      }); 

      $("#datetimepicker").datepicker({
          dateFormat: 'yy/mm/dd'
      }); 

});

</script>
<style>
 .register
  {
  margin: 0 auto;
  width: 800px;
  padding: 20px;
  background: #f4f4f4;
  border-radius: 3px;
  -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.3);
  box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.3);
   }
  .register-input 
  {
  display: block;
  width: 100%;
  height: 38px;
  margin-top: 2px;
  font-weight: 500;
  background: none;
  border: 0;
  border-bottom: 1px solid #d8d8d8;
  }
  .register-input:focus {
  border-color: #1e9ce6;
  outline: 0;
}
.register-button {
  display: block;
  width: 100%;
  height: 42px;
  margin-top: 25px;
  font-size: 16px;
  font-weight: bold;
  color: white;
   text-align: center;
  background: #fcfcfc;
  border: 1px solid;
  border-color: #1f76bd;
  border-radius: 2px;
  cursor: pointer;
  background-image: -webkit-linear-gradient(top,  #1f76bd, #1f76bd);
  background-image: -moz-linear-gradient(top,  #1f76bd, #1f76bd);
  background-image: -o-linear-gradient(top,  #1f76bd, #1f76bd);
  background-image: linear-gradient(to bottom, #1f76bd, #1f76bd);
   -webkit-box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
  box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
}
/* .form-control::-webkit-input-placeholder { color:black; } */
#back
{
  margin-right:-150px;
}
#reg
{
  margin-left:300px;
  margin-bottom:30px;
}
</style>
    
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-8 col-lg-push-2">

            <form action="{{ route('user_infos.store') }}" method="POST" class="register">
              <div id="reg">
                <h3>Registration</h3>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group @if($errors->has('firstName')) has-error @endif">
                        <i class="fa fa-user" aria-hidden="true"></i>
                       <label for="firstName-field">First Name</label>
                    <input type="text" id="firstName" name="firstName" class="form-control register-input" value="{{ old("firstName") }}" placeholder=" First Name" required/>
                       @if($errors->has("firstName"))
                        <span class="help-block">{{ $errors->first("firstName") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('lastName')) has-error @endif">
                    <i class="fa fa-user" aria-hidden="true"></i>
                       <label for="lastName-field">Last Name</label>
                    <input type="text" id="lastName" name="lastName" placeholder=" Last Name" class="form-control register-input" value="{{ old("lastName") }}" required/>
                       @if($errors->has("lastName"))
                        <span class="help-block">{{ $errors->first("lastName") }}</span>
                       @endif
                    </div>
                 <div class="form-group @if($errors->has('name')) has-error @endif">
                   <i class="fa fa-user" aria-hidden="true"></i>
                       <label for="name-field">Username</label>
                    <input type="text" id="name" name="name" placeholder=" Username" class="form-control register-input" value="{{ old("name") }}" required/>
                       <span id="uspan" class="help-block"></span>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                     <i class="fa fa-key" aria-hidden="true"></i>
                       <label for="password-field">Password</label>
                    <input type="password" id="password" name="password" placeholder="password" class="form-control register-input" value="{{ old("password") }}" required/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('cpassword')) has-error @endif">
                     <i class="fa fa-key" aria-hidden="true"></i>
                       <label for="password-field">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder=" Confirm password" class="form-control register-input" value="{{ old("cpassword") }}" required/>
                       @if($errors->has("cpassword"))
                        <span class="help-block">{{ $errors->first("cpassword") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                    <i class="fa fa-at"></i>
                       <label for="email-field">Email</label>
                    <input type="text" id="email" name="email" placeholder=" example@gmail.com" class="form-control register-input" value="{{ old("email") }}" required/>
                      <span id="upan" class="help-block"></span>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                      <div class="form-group @if($errors->has('name')) has-error @endif">
                       <i class="fa fa-flag" aria-hidden="true"></i>
                       <label for="governorate-field">Select Your Governorate</label>
                         <select class="form-control register-input" name="level" id="governorate" required>
                         <option>select</option>
                          @foreach ($governrate as $key => $value)
                              <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                   
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                    <i class="fa fa-home" aria-hidden="true"></i>
                       <label for="governorate-field">Select Your City</label>
                         <select class="form-control register-input" name="city" id="city" required> 
                      </select>
                   
                    </div>
                <div class="form-group @if($errors->has('nationalid')) has-error @endif">
                  <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                       <label for="nationalid-field">Nationalid</label>
                    <input type="text" id="nationalid" name="nationalid" placeholder=" National Id" class="form-control register-input" value="{{ old("nationalid") }}" required/>
                    <span id="idspan" class="help-block"></span>
                       @if($errors->has("nationalid"))
                        <span class="help-block">{{ $errors->first("nationalid") }}</span>
                       @endif
                    </div>
                    
                    <div class="form-group @if($errors->has('address')) has-error @endif">
                    <i class="fa fa-road" aria-hidden="true"></i>
                       <label for="address-field">Address</label>
                    <textarea placeholder=" Enter Your Address" class="form-control register-input" id="address-field" rows="3" name="address" style="resize:none" required>{{ old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>


                    <div class="form-group @if($errors->has('birthdate')) has-error @endif">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                         <label for="phone-field">BirthDate</label>
                      <input type="text" placeholder=" Bithdate" class="form-control register-input" id="datetimepicker" rows="3" name="birthdate" required>{{ old("birthdate") }}</textarea>
                         @if($errors->has("birthdate"))
                          <span class="help-block">{{ $errors->first("birthdate") }}</span>
                         @endif
                    </div>


                


                    <div class="form-group @if($errors->has('phone')) has-error @endif">
                    <i class="fa fa-mobile" aria-hidden="true"></i>
                       <label for="phone-field">Phone</label>
                    <input type="text" placeholder=" Phone" class="form-control register-input" id="phone-field" rows="3" name="phone" required>{{ old("phone") }}</textarea>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('gender')) has-error @endif">
                    <i class="fa fa-male" aria-hidden="true"></i>/<i class="fa fa-female" aria-hidden="true"></i>
                       <label for="gender-field">Gender</label>
                    <select class="form-control register-input" required 
                            name="gender">
                        <option value="">Select</option>
                        <option value="male">male</option>
                        <option value="female">female</option>
                    </select>
                       @if($errors->has("gender"))
                        <span class="help-block">{{ $errors->first("gender") }}</span>
                       @endif
                    </div>
                    
                   <input type="hidden" name="type" value="{{ $type }}"></input>
                <div class="well well-sm">
                    <button type="submit" class=" register-button">Create Account</button>

                </div>
            </form>
           <div id="back">
                <a class="btn btn-link pull-right" href="{{URL::to('/register')}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
        </div>
    </div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
@endsection

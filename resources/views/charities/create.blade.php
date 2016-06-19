@extends('layouts.layout')

@section('header')
 
  
    <!-- <div class="page-header">
        <h3><i class="fa fa-arrow-circle-right fa-lg" aria-hidden="true"></i> Welcome</h3>
    </div> -->
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/assets/js/user_validation1.js"></script>

    <script src="/Admin/vaildregister.js"></script>
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
  color:white;
   text-align: center;
  background: #fcfcfc;
  border: 1px solid;
  border-color: #1f76bd;
  border-radius: 2px;
  cursor: pointer;
  background-image: -webkit-linear-gradient(top, #1f76bd, #1f76bd);
  background-image: -moz-linear-gradient(top, #1f76bd, #1f76bd);
  background-image: -o-linear-gradient(top, #1f76bd, #1f76bd);
  background-image: linear-gradient(to bottom, #1f76bd, #1f76bd);
   -webkit-box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
  box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
}
/* .form-control::-webkit-input-placeholder { color:black; } */
#back
{
  margin-right:50px;
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
        <div class="col-md-12">

            <form action="{{ route('charities.store') }}" method="POST" enctype="multipart/form-data" id="form" class="register">
            <div id="reg">
                <h3>Registration</h3>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
               
                 <div class="form-group @if($errors->has('name')) has-error @endif">
                 <i class="fa fa-user" aria-hidden="true"></i>
                       <label for="name-field">Name</label>
                    <input type="text" id="name" name="name" placeholder=" Username" class="form-control register-input"" value="{{ old("name") }}" required/>
                      <span id="uspan" class="help-block"></span>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                     <i class="fa fa-key" aria-hidden="true"></i>
                       <label for="password-field">Password</label>
                    <input type="password" id="password" name="password" placeholder=" password" class="form-control register-input" value="{{ old("password") }}" required/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                     <i class="fa fa-key" aria-hidden="true"></i>
                       <label for="password-field">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder=" Confirm password" class="form-control register-input" value="{{ old("password") }}" required/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
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
                         <option value="0">Select</option>
                         option>
                          @foreach ($governrate as $key => $value)
                              <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                   
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                    <i class="fa fa-home" aria-hidden="true"></i>
                       <label for="city-field">Select Your City</label>
                         <select required  class="form-control register-input" name="city" id="city" > 
                      </select>
                    </div>
                   <div class="form-group @if($errors->has('address')) has-error @endif">
                   <i class="fa fa-road" aria-hidden="true"></i>
                       <label for="address-field">Address</label>
                    <textarea placeholder=" Enter Your Address" class="form-control register-input" id="address-field" rows="3" name="address"  style="resize:none" required>{{ old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
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
                     <div class="form-group @if($errors->has('taxnum')) has-error @endif">
                       <i class="fa fa-calculator" aria-hidden="true"></i>
                       <label for="taxnum-field">Taxnum</label>
                    <input type="text" id="taxnum-field" name="taxnum" placeholder=" Taxnum" class="form-control register-input" value="{{ old("taxnum") }}" required/>
                       @if($errors->has("taxnum"))
                        <span class="help-block">{{ $errors->first("taxnum") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('publishdate')) has-error @endif">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                       <label for="publishdate-field">Publishdate</label>
                    <input type="text" id="datetimepicker" name=" publishdate" placeholder="Enter Date" class="form-control register-input" value="{{ old("publishdate") }}" required/>
                       @if($errors->has("publishdate"))
                        <span class="help-block">{{ $errors->first("publishdate") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('credit')) has-error @endif">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>

                       <label for="credit-field">Bank Account</label>
                    <input required="" type="text" id="credit" name="credit" placeholder=" Bank Account" class="form-control register-input" value="{{ old("credit") }}" required/>
                       @if($errors->has("credit"))
                        <span class="help-block">{{ $errors->first("credit") }}</span>
                       @endif
                    </div>
                     <div class="form-group @if($errors->has('image')) has-error @endif">
                      <i class="fa fa-file-image-o" aria-hidden="true"></i>
                       <label for="image-field">Pic Advertise</label>
                      <input type="file" id="image" name="image" class="register-input" value="{{ old("image") }}" required/>
                       @if($errors->has("image"))
                        <span class="help-block">{{ $errors->first("image") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('image1')) has-error @endif">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                       <label for="image1-field">Pic Tax</label>
                      <input type="file" id="image1" name="image1" class="register-input" value="{{ old("image1") }}" required/>
                       @if($errors->has("image1"))
                        <span class="help-block">{{ $errors->first("image1") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="register-button" id="btn">Create Account</button>
                   
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

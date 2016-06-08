@extends('layouts.layout')

@section('header')
 
  
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> Charities / Create </h1>
    </div>
    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/Admin/jquery-ui.min.js" type="text/javascript"></script>

    <script>
    onload = function(){
              var password;
              var confirmpassword;
              password=document.getElementById("password");
              confirmpassword= document.getElementById("cpassword");
              

              confirmpassword.onblur=function(){

                  if (password.value != confirmpassword.value) {

                      alert("password not match");
                      

                  }


              }
              function validateEmail(email) {
                      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                      return re.test(email);
}
        }
  </script>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('charities.store') }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

               
                 <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="name-field">Username</label>
                    <input type="text" id="name1" name="name1" class="form-control" value="{{ old("name") }}" required/>
                      <span id="uspan" class="help-block"></span>
                       @if($errors->has("name"))
                        <span class="help-block">{{ $errors->first("name") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                       <label for="password-field">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ old("password") }}" required/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('password')) has-error @endif">
                       <label for="password-field">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" value="{{ old("password") }}" required/>
                       @if($errors->has("password"))
                        <span class="help-block">{{ $errors->first("password") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('email')) has-error @endif">
                       <label for="email-field">Email</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ old("email") }}" required/>
                       <span id="upan" class="help-block"></span>
                       @if($errors->has("email"))
                        <span class="help-block">{{ $errors->first("email") }}</span>
                       @endif
                    </div>
                   <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="governorate-field">Select Your Governorate</label>
                         <select class="form-control" name="level" id="level" required>
                          @foreach ($governrate as $key => $value)
                              <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                   
                    </div>
                    <div class="form-group @if($errors->has('name')) has-error @endif">
                       <label for="governorate-field">Select Your City</label>
                         <select class="form-control" name="city" id="city" required> 
                          @foreach($city as $key => $value)
                              <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                          @endforeach
                      </select>
                   
                    </div>
                   <div class="form-group @if($errors->has('address')) has-error @endif">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address" required>{{ old("address") }}</textarea>
                       @if($errors->has("address"))
                        <span class="help-block">{{ $errors->first("address") }}</span>
                       @endif
                    </div>
                   <div class="form-group @if($errors->has('phone')) has-error @endif">
                       <label for="phone-field">Phone</label>
                    <input type="text" class="form-control" id="phone-field" rows="3" name="phone" required>{{ old("phone") }}</textarea>
                       @if($errors->has("phone"))
                        <span class="help-block">{{ $errors->first("phone") }}</span>
                       @endif
                    </div>
                     <div class="form-group @if($errors->has('taxnum')) has-error @endif">
                       <label for="taxnum-field">Taxnum</label>
                    <input type="text" id="taxnum-field" name="taxnum" class="form-control" value="{{ old("taxnum") }}" required/>
                       @if($errors->has("taxnum"))
                        <span class="help-block">{{ $errors->first("taxnum") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('publishdate')) has-error @endif">
                       <label for="publishdate-field">Publishdate</label>
                    <input type="date" id="publishdate-field" name="publishdate" class="form-control" value="{{ old("publishdate") }}" required/>
                       @if($errors->has("publishdate"))
                        <span class="help-block">{{ $errors->first("publishdate") }}</span>
                       @endif
                    </div>
                     <div class="form-group @if($errors->has('image')) has-error @endif">
                       <label for="image-field">Pic Advertise</label>
                      <input type="file" id="image" name="image" class="form-control" value="{{ old("image") }}" required/>
                       @if($errors->has("image"))
                        <span class="help-block">{{ $errors->first("image") }}</span>
                       @endif
                    </div>
                    <div class="form-group @if($errors->has('image1')) has-error @endif">
                       <label for="image1-field">Pic Tax</label>
                      <input type="file" id="image1" name="image1" class="form-control" value="{{ old("image1") }}" required/>
                       @if($errors->has("image1"))
                        <span class="help-block">{{ $errors->first("image1") }}</span>
                       @endif
                    </div>
                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary" id="btn"><a href="{{URL::to('/login')}}">Create</a></button>
                    <a class="btn btn-link pull-right" href="{{URL::to('/register')}}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

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

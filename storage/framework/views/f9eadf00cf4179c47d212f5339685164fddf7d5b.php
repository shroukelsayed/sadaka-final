<?php $__env->startSection('css'); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/Admin/form.css">
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>

    <script src="/Admin/jquery-1.11.3.min.js" type="text/javascript"></script>
    
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> New Case </h1>
    </div>


    <script>
      
      $(document).ready(function () {

          case_name_err = $('#case_name');
          $(":input[name='name']").on("blur", function () {
          var sentData = {'name': $(":input[name='name']").val(), '_token': $('input[name=_token]').val()};
          console.log(sentData);
              $.ajax({
                  url: '/people/create/?action=name',
                  type: "POST",
                  data: {'name': $(":input[name='name']").val(), '_token': $('input[name=_token]').val()},

                  success: function (data) {
                      // alert(data);
                      console.log(data.length==0); 
                      if(data.length==0){
                          console.log("Available");
                          case_name_err.html("<b>User Name Available</b>");
                      }else{
                          console.log("not Available");
                          case_name_err.html("<b>User Name NOT Available</b>");
                          $('#name-field').focus();
                      }
                  }
              });
          });


        $('#governorate_id_field').change(function(){
                $.get("<?php echo e(url('api/dropdown')); ?>", 
                    { option: $(this).val() }, 
                    function(data) {
                      console.log(data);
                        var city = $('#citySelect');
                        city.empty();
                        console.log(city.id);
                        $.each(data, function(index, element) {
                            city.append("<option value='"+ element['id'] +"'>" + element['name'] + "</option>");
                        });
                    });
            });


        // console.log("hiiiii");
        $("#donation_type_id_field").on("change", function () {
          // console.log("donation_type");
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            // console.log(valueSelected);
            if(valueSelected == 1 ){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for Blood ...

              var donationForm ="<div class='form-group <?php if($errors->has("+bloodtype+")): ?> has-error <?php endif; ?>'><label for='bloodtype-field'>Case Bloodtype</label><span style='color:red; margin-left: 10px;'>*</span><select required name='bloodtype' id='bloodtype-field' class='form-control'><option value='A+'>A+</option><option value='A-'>A-</option><option value='B+'>B+</option><option value='B-'>B-</option><option value='O+'>O+</option><option value='O-'>O-</option><option value='AB+'>AB+</option><option value='AB-'>AB-</option></select></div>";

              donationForm += "<div class='form-group <?php if($errors->has("+amount+")): ?> has-error <?php endif; ?>'><label for='amount-field'>Blood Amount</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' id='amount-field' name='amount' class='form-control' value='<?php echo e(old("+amount+")); ?>'/><?php if($errors->has("+amount+")): ?><span class='help-block'><?php echo e($errors->first("+amount+")); ?></span><?php endif; ?></div>";

              donationForm += "<div class='form-group <?php if($errors->has("+hospital+")): ?> has-error <?php endif; ?>'><label for='hospital-field'>Hospital</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='hospital-field' rows='3' name='hospital'><?php echo e(old("+hospital+")); ?><?php if($errors->has("+hospital+")): ?><span class='help-block'><?php echo e($errors->first("+hospital+")); ?></span><?php endif; ?></div>";

              donationForm += "<div class='form-group'><label for='governorate_id_field'>Hospital .. Governorate Name </label><select required name='g_id' id='governorate_id_field' class='form-control'><option></option><?php foreach ($governorates as $key => $value){
                  echo "<option value=".($key+1).">".$value['name']."</option>"; } ?>";
              donationForm += "</select></div>";

              donationForm += '<div class="form-group"><label for="citySelect">City Name </label><span style="color:red; margin-left: 10px;">*</span><select required name="c_id" id="citySelect" class="form-control"><option value="1">m</option></select></div>';

              donationForm += "<div class='form-group <?php if($errors->has("+address+")): ?> has-error <?php endif; ?>'><label for='address-field'>Hospital .. Address</label><span style='color:red; margin-left: 10px;'>*</span><input required type='text' class='form-control' id='address-field' rows='3'name='address'/><?php echo e(old("+address+")); ?><?php if($errors->has("+address+")): ?><span class='help-block'><?php echo e($errors->first("+address+")); ?></span><?php endif; ?></div>";
              
              donationDiv.innerHTML=donationForm; 

            }
            else if(valueSelected == 2){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML = "";
              // Donation Form for 'Money' ...

              var donationForm ="<div class='form-group <?php if($errors->has("+amount+")): ?> has-error <?php endif; ?>'>";

              donationForm += "<label for='amount-field'>Money Amount</label><span style='color:red; margin-left: 10px;'>*</span>";
              
              donationForm += "<input required type='text' id='amount-field' name='amount' class='form-control' value='<?php echo e(old("+amount+")); ?>'/>";
              
              donationForm += "<?php if($errors->has("+amount+")): ?><span class='help-block'><?php echo e($errors->first("+amount+")); ?></span><?php endif; ?></div>";
             
              donationDiv.innerHTML=donationForm; 
            } 
            else if(valueSelected == 3){
              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for 'Medicine' ...

              var donationForm =" <div class='form-group <?php if($errors->has("+name+")): ?> has-error <?php endif; ?>'>";

              donationForm += "<label for='name-field'>Medicine Name</label><span style='color:red; margin-left: 10px;'>*</span>";

              donationForm += "<input required type='text' id='name-field' name='name' class='form-control' value='<?php echo e(old("+name+")); ?>'/>";

              donationForm += " <?php if($errors->has("+name+")): ?><span class='help-block'><?php echo e($errors->first("+name+")); ?></span><?php endif; ?></div>";

              donationForm += "<div class='form-group <?php if($errors->has('amount')): ?> has-error <?php endif; ?>'><label for='amount-field'>Medicine Amount</label><span style='color:red; margin-left: 10px;'>*</span>";

              donationForm += "<input required type='text' id='amount-field' name='amount' class='form-control' value='<?php echo e(old("+amount+")); ?>'/>";

              donationForm += "<?php if($errors->has("+amount+")): ?><span class='help-block'><?php echo e($errors->first("+amount+")); ?></span><?php endif; ?></div>";

              donationDiv.innerHTML=donationForm; 
            } 
            else if(valueSelected == 4){

              donationDiv=document.getElementById("donationDiv");
              donationDiv.innerHTML= "";

              // Donation Form for 'Other' ...

              var donationForm= "<div class='form-group <?php if($errors->has("+description+")): ?> has-error <?php endif; ?>'><label for='description-field'>Case Description</label> <span style='color:red; margin-left: 10px;'>*</span><textarea required class='form-control' id='description-field' rows='3' name='description'><?php echo e(old("+description+")); ?></textarea>";

                donationForm +="<?php if($errors->has('description')): ?><span class='help-block'><?php echo e($errors->first('description')); ?></span> <?php endif; ?></div>";

                donationDiv.innerHTML=donationForm; 

            } 
            else{
                donationDiv=document.getElementById("donationDiv");
                donationDiv.innerHTML= "";
            }

        });
        $("#interval_type_id_field").on("change", function () {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            // console.log(valueSelected);
            if(valueSelected == "" || valueSelected == 1 ){
              // console.log("valueSelected");
              intervalDiv=document.getElementById("intervalDiv");
              intervalDiv.innerHTML = "";
            }
            else{
              // console.log(valueSelected);
              intervalDiv=document.getElementById("intervalDiv");
              intervalDiv.innerHTML= "";

              var intervalForm = "<div class='form-group <?php if($errors->has("+numtimes+")): ?> has-error <?php endif; ?>'>";

              intervalForm += "<label for='numtimes-field'>Number Of Times</label><span style='color:red; margin-left: 10px;'>*</span>";
              
              intervalForm += "<input required type='text' id='numtimes-field' name='numtimes' class='form-control' value='<?php echo e(old("+numtimes+")); ?>'/>";
              
              intervalForm += "<?php if($errors->has("+numtimes+")): ?><span class='help-block'><?php echo e($errors->first("+numtimes+")); ?></span><?php endif; ?></div>";

              intervalDiv.innerHTML = intervalForm;

            }
        });


        var next = 0;
        $("#add-more").click(function(e){
            e.preventDefault();
            var addto = "#field" + next;
            var addRemove = "#field" + (next);
            next = next + 1;

            var newIn = '<div id="field'+ next +'" name="field'+ next +'">';
            newIn += '<div class="form-group"><label for="case_doc_field">Case Documents</label><span style="color:red; margin-left: 10px;">*</span><input type="file" id="case_doc_field" multiple="true" name="case_doc[]" style="margin-left: 130px;" required value="<?php echo e(old("case_doc")); ?>"/><?php if($errors->has("case_doc")): ?><span class="help-block"><?php echo e($errors->first("case_doc")); ?></span><?php endif; ?></div></div>';
            
            var newInput = $(newIn);
            var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" style="margin-top: -45px; float: right; margin-right: 350px;">Remove</button></div></div><div id="field">';
            var removeButton = $(removeBtn);
            $(addto).after(newInput);
            $(addRemove).after(removeButton);
            $("#field" + next).attr('data-source',$(addto).attr('data-source'));
            $("#count").val(next);  
            
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
        });

        
        });

    </script>
  <script src="/Admin/form.js"></script>
  <script src="/Admin/vaild.js" type="text/javascript"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-md-12">

          <div class="container" style="width: 900px;height: 900px;">
                
            <div class="stepwizard" >
            <div class="stepwizard-row setup-panel">
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle" style="border-radius: 25px;margin-left: 140px;">1</a>
                <p style="margin-left: 80px;text-align: center;">Case Personal Information</p>
              </div>
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" style="border-radius: 25px;margin-left: 100px;" disabled="disabled">2</a>
                <p style="margin-left: 60px;text-align: center;">Donation Information</p>
              </div> 
              <div class="stepwizard-step" style="display: table-cell;">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" style="border-radius: 25px;margin-left: 170px;" disabled="disabled">3</a>
                <p style="margin-left: 130px;text-align: center;">Case Documents</p>
            </div> 
            </div>
          </div>

            <form action="<?php echo e(route('people.store')); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  
                   <div class="row setup-content" id="step-1">
                    <div class="col-xs-12">
                      <div class="col-md-12">
                        <h3> Case Personal Information</h3>
                            <!-- Case Personal Information -->

                            <div class="containeer" style="">
                            <ul class="nav nav-tabs">
                              <li class="active"><a data-toggle="pill" href="#menu1" style="width: 200px; text-align: center;width: 200px;background-color: #286090;color: white;">Existing Person</a></li>
                              <li><a data-toggle="pill" href="#menu2" style="width: 200px; text-align: center;">New Person</a></li>
                            </ul>
                            
                            <div class="tab-content">
                              <div id="menu1" class="tab-pane fade in active">
                                <h3>Existing Person</h3>
                                
                                <!-- // search for existing PersonInfo  -->
                                <input type="search" class="form-control"></input>
                                <button class="btn btn-primary nextBtn btn-lg" style="margin-top: 20px;" type="button">Search</button>

                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>New Person</h3>

                                <!-- // adding new PersonInfo  -->
                          <div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                       <label for="name-field">Case Name</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="name-field" rows="3" name="name"/><?php echo e(old("name")); ?>

                        <span id="case_name" class="help-block"></span>
                       <?php if($errors->has("name")): ?>
                        <span class="help-block"><?php echo e($errors->first("name")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('address')): ?> has-error <?php endif; ?>">
                       <label for="address-field">Case Address</label>
                       <span style="color:red; margin-left: 10px;">*</span>
                    <input required type="text" class="form-control" id="address-field" rows="3" name="address"/><?php echo e(old("address")); ?>

                       <?php if($errors->has("address")): ?>
                        <span class="help-block"><?php echo e($errors->first("address")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('birthdate')): ?> has-error <?php endif; ?>">
                       <label for="birthdate-field">Case BirthDate</label>
                    <input required type="date" id="birthdate-field" name="birthdate" class="form-control" value="<?php echo e(old("birthdate")); ?>"/>
                       <?php if($errors->has("birthdate")): ?>
                        <span class="help-block"><?php echo e($errors->first("birthdate")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Governorate Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="governorate_id" id="governorate_id_field" class="form-control">
                          <option></option>
                          <?php foreach($governorates as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['name']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="citySelect">City Name </label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <select required name="city_id" id="citySelect" class="form-control">
                          <option></option>
                      </select>
                    </div>
                    <div class="form-group <?php if($errors->has('gender')): ?> has-error <?php endif; ?>">
                       <label for="gender-field">Case Gender</label>
                    <input required type="text" id="gender-field" name="gender" class="form-control" value="<?php echo e(old("gender")); ?>"/>
                       <?php if($errors->has("gender")): ?>
                        <span class="help-block"><?php echo e($errors->first("gender")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('maritalstatus')): ?> has-error <?php endif; ?>">
                       <label for="maritalstatus-field">Case Marital Status</label>
                    <input required type="text" id="maritalstatus-field" name="maritalstatus" class="form-control" value="<?php echo e(old("maritalstatus")); ?>"/>
                       <?php if($errors->has("maritalstatus")): ?>
                        <span class="help-block"><?php echo e($errors->first("maritalstatus")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
                       <label for="phone-field">Case Phone</label>
                    <input required type="text" id="phone-field" name="phone" class="form-control" value="<?php echo e(old("phone")); ?>"/>
                       <?php if($errors->has("phone")): ?>
                        <span class="help-block"><?php echo e($errors->first("phone")); ?></span>
                       <?php endif; ?>
                    </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

                              </div>
                            </div>
                          </div>
                            
            </div>
        </div>
    </div>
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Donation Information </h3>
               <!-- Donation Information --> 

                    <div class="form-group">
                      <label for="donation_type_id_field">Donation Type </label>
                      <select required name="donation_type_id" id="donation_type_id_field" class="form-control">
                          <option></option>
                          <?php foreach($donate_types as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['type']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group" id="donationDiv">
                      
                    </div>

                 <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select required name="interval_type_id" id="interval_type_id_field" class="form-control">
                          <option></option>
                          <?php foreach($interval_types as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['type']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div> 

                    <div class="form-group" id="intervalDiv">
                    </div> 

                    <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

                  </div>
                </div>
              </div>

               <div class="row setup-content" id="step-4">
                <div class="col-xs-12">
                  <div class="col-md-12" >
                    <h3> Case Documents</h3>
                    <div id="field">
                    <div id="field0">
                
                    <div class="form-group">
                      <label for="case_doc_field">Case Documents</label>
                      <span style="color:red; margin-left: 10px;">*</span>
                      <?php echo Form::file('case_doc[]', array('multiple'=>true ,'style="margin-left: 130px;"')); ?>

                      
                         <?php if($errors->has("case_doc")): ?>
                          <span class="help-block"><?php echo e($errors->first("case_doc")); ?></span>
                        <?php endif; ?>
                    </div>


                </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                  <div class="col-md-4">
                    <button id="add-more" name="add-more" style="float: right; margin-right: -450px;" class="btn btn-primary">Add More</button>
                  </div>
                </div>
                <br><br>
                                

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="<?php echo e(route('people.index')); ?>"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
  <script>
    $('.date-picker').datepicker({
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
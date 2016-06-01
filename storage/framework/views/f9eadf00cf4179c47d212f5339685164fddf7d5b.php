<?php $__env->startSection('css'); ?>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header'); ?>
    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> People / Create </h1>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="row">
        <div class="col-md-12">

            <form action="<?php echo e(route('people.store')); ?>" method="POST">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
                       <label for="name-field">Name</label>
                    <textarea class="form-control" id="name-field" rows="3" name="name"><?php echo e(old("name")); ?></textarea>
                       <?php if($errors->has("name")): ?>
                        <span class="help-block"><?php echo e($errors->first("name")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('address')): ?> has-error <?php endif; ?>">
                       <label for="address-field">Address</label>
                    <textarea class="form-control" id="address-field" rows="3" name="address"><?php echo e(old("address")); ?></textarea>
                       <?php if($errors->has("address")): ?>
                        <span class="help-block"><?php echo e($errors->first("address")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('birthdate')): ?> has-error <?php endif; ?>">
                       <label for="birthdate-field">BirthDate</label>
                    <input type="date" id="birthdate-field" name="birthdate" class="form-control" value="<?php echo e(old("birthdate")); ?>"/>
                       <?php if($errors->has("birthdate")): ?>
                        <span class="help-block"><?php echo e($errors->first("birthdate")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group">
                      <label for="governorate_id_field">Governorate Name </label>
                      <select name="governorate_id" id="governorate_id_field">
                          <?php foreach($governorates as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['name']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="city_id_field">City Name </label>
                      <select name="city_id" id="city_id_field">
                          <?php foreach($cities as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['name']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group <?php if($errors->has('gender')): ?> has-error <?php endif; ?>">
                       <label for="gender-field">Gender</label>
                    <input type="text" id="gender-field" name="gender" class="form-control" value="<?php echo e(old("gender")); ?>"/>
                       <?php if($errors->has("gender")): ?>
                        <span class="help-block"><?php echo e($errors->first("gender")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('maritalstatus')): ?> has-error <?php endif; ?>">
                       <label for="maritalstatus-field">Maritalstatus</label>
                    <input type="text" id="maritalstatus-field" name="maritalstatus" class="form-control" value="<?php echo e(old("maritalstatus")); ?>"/>
                       <?php if($errors->has("maritalstatus")): ?>
                        <span class="help-block"><?php echo e($errors->first("maritalstatus")); ?></span>
                       <?php endif; ?>
                    </div>
                    <div class="form-group <?php if($errors->has('phone')): ?> has-error <?php endif; ?>">
                       <label for="phone-field">Phone</label>
                    <input type="text" id="phone-field" name="phone" class="form-control" value="<?php echo e(old("phone")); ?>"/>
                       <?php if($errors->has("phone")): ?>
                        <span class="help-block"><?php echo e($errors->first("phone")); ?></span>
                       <?php endif; ?>
                    </div>
                <div class="form-group <?php if($errors->has('publishat')): ?> has-error <?php endif; ?>">
                       <label for="publishat-field">Publishat</label>
                    <input type="date" id="publishat-field" name="publishat" class="form-control" value="<?php echo e(old("publishat")); ?>"/>
                       <?php if($errors->has("publishat")): ?>
                        <span class="help-block"><?php echo e($errors->first("publishat")); ?></span>
                       <?php endif; ?>
                    </div>
                
                    <div class="form-group">
                      <label for="donation_type_id_field">Donation Type </label>
                      <select name="donation_type_id" id="donation_type_id_field">
                          <?php foreach($donate_types as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['type']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="interval_type_id_field">Interval Type </label>
                      <select name="interval_type_id" id="interval_type_id_field">
                          <?php foreach($interval_types as $key => $value): ?>
                              <option value="<?php echo e($key+1); ?>"><?php echo e($value['type']); ?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="form-group <?php if($errors->has('amount')): ?> has-error <?php endif; ?>">
                       <label for="amount-field">Donation Money Amount</label>
                    <input type="text" id="amount-field" name="amount" class="form-control" value="<?php echo e(old("amount")); ?>"/>
                       <?php if($errors->has("amount")): ?>
                        <span class="help-block"><?php echo e($errors->first("amount")); ?></span>
                       <?php endif; ?>
                    </div>
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
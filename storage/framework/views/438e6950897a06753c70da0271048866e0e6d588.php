<?php $__env->startSection('header'); ?>
<div class="page-header">
        <h1>People / Show #<?php echo e($person->id); ?></h1>
        <form action="<?php echo e(route('people.destroy', $person->id)); ?>" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <div class="btn-group pull-right" role="group" aria-label="...">
                <a class="btn btn-warning btn-group" role="group" href="<?php echo e(route('people.edit', $person->id)); ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                <button type="submit" class="btn btn-danger">Delete <i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">

            <form action="#">
                <div class="form-group">
                    <label for="nome">ID</label>
                    <p class="form-control-static"></p>
                </div>
                <div class="form-group">
                     <label for="publishat">PUBLISHAT</label>
                     <p class="form-control-static"><?php echo e($person->publishat); ?></p>
                </div>
            </form>

            <a class="btn btn-link" href="<?php echo e(route('people.index')); ?>"><i class="glyphicon glyphicon-backward"></i>  Back</a>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
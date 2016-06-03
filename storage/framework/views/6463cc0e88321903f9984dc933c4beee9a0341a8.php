<?php $__env->startSection('header'); ?>
    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> People
            <a class="btn btn-success pull-right" href="<?php echo e(route('people.create')); ?>"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
      <div class="row">
        <div class="col-md-12">
            <?php if($personinfo->count()): ?>
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Marital Status</th>
                            <th>Donation Type</th>
                            <th>Publish At</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                             <?php foreach($personinfo as $one): ?>
                            <tr>
                                <td><?php echo e($one->name); ?></td>
                                <td><?php echo e($one->address); ?></td>
                                <td><?php echo e($one->maritalstatus); ?></td>
                                <?php foreach($one->people as $p): ?>
                                <td><?php echo e($p->donationType->type); ?></td> 
                                <td><?php echo e($p->publishat); ?></td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('people.show', $one->id)); ?>"><i class="glyphicon glyphicon-eye-open"></i> View</a>
                                    <a class="btn btn-xs btn-warning" href="<?php echo e(route('people.edit', $one->id)); ?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <form action="<?php echo e(route('people.destroy', $one->id)); ?>" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    </form>
                                </td>
                                <?php endforeach; ?> 
                            </tr>
                             <?php endforeach; ?>            
                    </tbody>
                </table>
               
            <?php else: ?>
                <h3 class="text-center alert alert-info">Empty!</h3>
            <?php endif; ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminlayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
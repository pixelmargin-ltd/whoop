<?php

use \App\Models\Admin\Messages\EventMessage;
use \App\Http\Controllers\Admin\Message\MessageController;

?>

<?php $__env->startSection('title', 'Quote Message List'); ?>
<?php $__env->startSection('content'); ?>
    <style>
        .ui-sortable-helper {
            display: table;
        }
    </style>
    <?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-container container-fluid">
        <div class="page-container">
            <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="page-content">
                <div class="page-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-12">
                            <div class="widget">
                                <div class="widget-header ">
                                    <span class="widget-caption">
                                        <a href="<?php echo e(url('admin/quote-messages/add')); ?>"
                                           class="btn btn-default btn-xs shiny icon-only blue addnewbtn">
                                            <i class="fa fa-plus"></i>
                                        </a>&nbsp;
                                        Quote Message List
                                    </span>
                                </div>

                                <div class="widget-body">
                                    <?php if(Session::has('success')): ?>
                                        <div class="alert alert-success fade in">
                                            <?php echo e(Session::get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <?php if(count($errors) > 0): ?>
                                        <div class="alert alert-danger fade in">
                                            <ul>
                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><?php echo e($error); ?></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(is_array($quoteMessages) && count($quoteMessages) > 0): ?>
                                        <table class="table table-striped table-hover table-bordered">
                                            <thead>
                                            <tr>
                                                <th>User Id</th>
                                                <th>Target Type</th>
                                                <th>Event Type</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody id="sortable">
                                            <?php $__currentLoopData = $quoteMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quoteMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr data-id="<?php echo e($quoteMessage['id']); ?>">
                                                    <td><?php echo e($quoteMessage['target_id']); ?></td>
                                                    <td><?php echo e($quoteMessage['target_type']); ?></td>
                                                    <td><?php echo e($quoteMessage['event_type']); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(url('/admin/quote-messages/edit/'.$quoteMessage['id'])); ?>" class="btn btn-info btn-xs edit"><i class="fa fa-edit"></i> Edit</a>
                                                    <a href="javascript:;" class="btn btn-danger btn-xs deletequote" data-id="<?php echo e($quoteMessage['id']); ?>" data-url="<?php echo e(url('/admin/quote-messages/'.$quoteMessage['id'])); ?>"><i class="fa fa-trash-o"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    <?php else: ?>
                                        <h2>No quote messages to display</h2>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
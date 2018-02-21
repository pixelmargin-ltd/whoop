<?php use \App\Models\Admin\Cities; ?>

<?php $__env->startSection('title', 'Cities List'); ?>
<?php $__env->startSection('content'); ?>
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
                                   Cities List
                               </span>
                                </div>

                                <div class="widget-body">
                                    <?php if(Session::has('success')): ?>
                                        <div class="alert alert-success fade in">
                                            <?php echo e(Session::get('success')); ?>

                                        </div>
                                    <?php endif; ?>
                                    <table class="table table-striped table-hover table-bordered" id="usertable">
                                        <thead>
                                        <tr role="row">
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Credits Left
                                            </th>
                                            <th>
                                                Total Credist
                                            </th>
                                            <th>
                                                Image
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Options
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($cities)): ?>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr role="row">
                                                    <td><?php echo e($city['name']); ?></td>
                                                    <td><?php echo e($city['credits_left']); ?></td>
                                                    <td><?php echo e($city['credits_total']); ?></td>
                                                    <td>
                                                        <img src="<?php echo e(getImageUrl($city['name'].'.'.Cities::IMG_EXTENSION,
                                                        'cities')); ?>"
                                                             width="100">
                                                    </td>
                                                    <td width="200px">
                                                        <label class="switch">
                                                            <input type="checkbox" id="cityStatusUpdate"
                                                                   data-id="<?php echo e($city['id']); ?>"
                                                                    <?php echo e($city['status'] ===
                                                                    Cities::STATUS_ACTIVE?'checked':''); ?>>
                                                            <span class="slider"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo e(route('cities.edit',$city['id'])); ?>"
                                                           class="btn btn-info btn-xs edit">
                                                            <i class="fa fa-edit"></i>Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-script'); ?>
    <script>
        $(document).ready(function () {
            //Todo : Code for switching status
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
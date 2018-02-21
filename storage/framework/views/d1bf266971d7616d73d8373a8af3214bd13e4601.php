<table class="table table-striped table-hover table-bordered" id="others-table">
    <thead>
    <tr role="row">
        <th>
            Image
        </th>
        <th>
            Name
        </th>
        <th>
            Credits Left
        </th>
        <th>
            Credits Total
        </th>
        <th>
            Commission Rate
        </th>
        <th>
            Options
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if(isset($others)): ?>
        <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $boost_code_provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr role="row">
                <td>
                    <img src="<?php echo e(getImageUrl(basename($boost_code_provider['image']),\App\Models\Admin\BoostCodeProvider::IMAGE_PATH)); ?>"
                         width="120">
                </td>
                <td><?php echo e($boost_code_provider['name']); ?></td>
                <td><?php echo e($boost_code_provider['credits_left']); ?></td>
                <td><?php echo e($boost_code_provider['credits_total']); ?></td>
                <td><?php echo e($boost_code_provider['commission_rate']); ?>%</td>
                <td>
                    <a href="<?php echo e(route('boost_code_providers.edit',$boost_code_provider['id'])); ?>"
                       class="btn btn-info btn-xs edit">
                        <i class="fa fa-edit"></i> Edit</a>
                    <?php echo displayDeleteForm(route('boost_code_providers.destroy',$boost_code_provider['id'])); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>

</table>
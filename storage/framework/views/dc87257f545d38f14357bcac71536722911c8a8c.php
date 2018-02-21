<table class="table table-striped table-hover table-bordered" id="cities-table">
    <thead>
    <tr role="row">
        <th>
            Image
        </th>
        <th>
            City
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
    <?php if(isset($cities)): ?>
        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr role="row">
                <td>
                    <img src="<?php echo e(getImageUrl(basename($city['image']),\App\Models\Admin\BoostCodeProvider::IMAGE_PATH)); ?>"
                         width="120">
                </td>
                <td><?php echo e($city['name']); ?></td>
                <td><?php echo e($city['credits_left']); ?></td>
                <td><?php echo e($city['credits_total']); ?></td>
                <td><?php echo e($city['commission_rate']); ?>%</td>
                <td>
                    <a href="<?php echo e(route('boost_code_providers.edit',$city['id'])); ?>"
                       class="btn btn-info btn-xs edit">
                        <i class="fa fa-edit"></i> Edit</a>
                    <?php echo displayDeleteForm(route('boost_code_providers.destroy',$city['id'])); ?>

                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>

</table>
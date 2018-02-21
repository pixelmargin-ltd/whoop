<?php $__env->startSection('title', 'Edit Service Provider'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('admin.includes.navigation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="main-container container-fluid addarticle">
        <!-- Page Container -->
        <div class="page-container">
            <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
            <!-- Page Content -->
            <div class="page-content">
               <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <div class="well invoice-container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h3 class="">
                                            <i class="fa fa-check"></i>
                                            Edit Service Provider
                                        </h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="widget">
                                            <div class="">
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

                                                <?php echo Form::open(['name' => 'frmEditProvider', 'id' => 'frmEditProvider', 'files' => true, 'class' => 'form-horizontal', 'method' => 'post', 'enctype' => 'multipart/form-data', 'route' => array('provider.update', $provider['id'])]); ?>

                                                    <input type="hidden" id="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Select Category</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="category" id="category">
                                                            <?php if(isset($categories)): ?>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($category['id']); ?>"

                                                                <?php if($category['id'] == $provider['category_id']): ?>
                                                                selected="selected" 
                                                                <?php endif; ?>
                                                                >
                                                                    <?php echo e($category['name']); ?>

                                                                </option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Select Deal</label>
                                                        <div class="col-sm-10 deal-container">
                                                            
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Brand Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="brand_name" name="brand_name" type="text" value="<?php echo e($provider['brand_name']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Strap Line</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="strap_line" name="strap_line" type="text" value="<?php echo e($provider['strap_line']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Title</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="title" name="title" type="text" value="<?php echo e($provider['title']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Message</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="message" id="message" class="form-control"><?php echo e($provider['message']); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Description</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="description" id="description" class="form-control"><?php echo e($provider['description']); ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">First Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="firstname" name="firstname" type="text" value="<?php echo e($provider['firstname']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="lastname" name="lastname" type="text" value="<?php echo e($provider['lastname']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Email</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="email" name="email" type="text" value="<?php echo e($provider['email']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Mobile No.</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="mobile" name="mobile" type="text"
                                                            value="<?php echo e($provider['mobile']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Street</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="street" name="street" type="text"
                                                            value="<?php echo e($provider['street']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">City</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="city" name="city" type="text" value="<?php echo e($provider['city']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Zip Code</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="zipcode" name="zipcode" type="text" value="<?php echo e($provider['zipcode']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">State</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="state" name="state" type="text" value="<?php echo e($provider['state']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Country</label>
                                                        <div class="col-sm-10">
                                                            <select name="country" id="country">
                                                                <option value="UK">UK</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Available for Zip Codes</label>
                                                        <div class="col-sm-10">
                                                           <input name="available_for_zipcodes" id="available_for_zipcodes" type="text" data-role="tagsinput" placeholder="Add Zipcodes" value="<?php echo e($provider['available_for_zipcodes']); ?>"> 
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Web URL</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="web_url" name="web_url" type="text" value="<?php echo e($provider['web_url']); ?>">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Logo</label>
                                                        <div class="col-sm-10">
                                                            <input id="logo" name="logo" type="file" value="<?php echo e($provider['logo']); ?>">
                                                            <input type="hidden" name="hdn_provider_id" id="hdn_provider_id" value="<?php echo e($provider['id']); ?>">
                                                            <input type="hidden" name="delete_file" id="delete_file" value="<?php echo e($provider['logo']); ?>">
                                                            <?php if(isset($provider['logo']) && $provider['logo']!=''): ?>
                                                                <?php echo e(getImage($provider['logo'], "provider")); ?>

                                                            <?php endif; ?>
                                                            Supported File Formats: (jpeg,png,jpg,gif,svg)
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Select Color</label>
                                                        <div class="col-sm-10">
                                                            <div class="minicolors minicolors-theme-bootstrap minicolors-position-bottom minicolors-position-left">
                                                                <input data-control="hue" class="form-control colorpicker minicolors-input" id="color" name="color" type="text" value="<?php echo e($provider['color']); ?>">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Commission Rate</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="commission_rate" name="commission_rate" type="text" value="<?php echo e($provider['commission_rate']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Discount Rate</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="commission_rate" name="discount_rate" type="number" value="<?php echo e($provider['discount_rate']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Unverified Commission Rate</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="unverified_commission_rate" name="unverified_commission_rate" type="text" value="<?php echo e($provider['unverified_commission_rate']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Whoop!Me Credit</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="whoop_credit" name="whoop_credit" type="text" value="<?php echo e($provider['whoop_credit']); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="inputEmail3">Upload Video</label>
                                                        <div class="col-sm-10">
                                                            <input id="video" name="video" type="file" value="<?php echo e($provider['video']); ?>">
                                                            <input type="hidden" name="hdn_provider_id" id="hdn_provider_id" value="<?php echo e($provider['id']); ?>">
                                                            <input type="hidden" name="delete_video_file" id="delete_video_file" value="<?php echo e($provider['video']); ?>">
                                                            <?php if($provider['video']!=""): ?>
                                                                <?php echo e(getVideo($provider['video'], "provider")); ?>

                                                            <?php endif; ?>
                                                            Supported Video Formats: (mp4,ogg,webm)
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-sm-offset-2 col-sm-10">
                                                            <button type="submit" name="btnEditProvider" id="btnEditProvider" class="btn btn-primary">Update</button>
                                                            <button type="reset" name="btnCancelAdd" id="btnCancelAdd" class="btn">Cancel</button>
                                                        </div>
                                                    </div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.baselayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
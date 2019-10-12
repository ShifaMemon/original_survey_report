<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST">
                        <?php echo e(csrf_field()); ?>


                        

                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="comp_id" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">

                            <select class="form-control" name="comp_id">

                            <?php
                                foreach($companies as $company)
 
                                {?>
                                    <?php if($company->c_name == Auth::user()->name): ?>
                                    <option value="<?php echo e($company->c_id); ?>"><?php echo e($company->c_name); ?></option>
                                    <?php endif; ?>
                                <?php
                                }?>


                            </select>

                            <?php if($errors->has('company_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div> 

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"> start date</label>

                            <div class="col-md-6">
                                <input id="s_start_date" type="date" class="form-control" name="s_start_date" required>

                                <?php if($errors->has('s_start_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('s_start_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                     
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"> end date</label>

                            <div class="col-md-6">
                                <input id="s_end_date" type="date" class="form-control" name="s_end_date" required>

                                <?php if($errors->has('end_date')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('end_date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="title" class="col-md-4 control-label">title</label>

                            <div class="col-md-6">
                                <input id="survey_title" type="text" class="form-control" name="survey_title" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('survey_title')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('survey_title')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="desc" class="col-md-4 control-label">description</label>

                            <div class="col-md-6">
                                <input id="desc" type="text" class="form-control" name="desc"  required>

                                <?php if($errors->has('desc')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('desc')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

        
                         


                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="status" class="col-md-4 control-label">status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status" required>
                                <option value="pending">pending</option>
                                <option  value="aproved">aproved</option>
                                <option  value="running">running</option>
                                </select>

                                <?php if($errors->has('status')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('status')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="align:center">
                                    submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
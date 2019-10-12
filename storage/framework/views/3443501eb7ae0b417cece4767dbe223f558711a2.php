<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="e_name" value="<?php echo e(old('e_name',$employee->e_name)); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                     

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email',$employee->email)); ?>" required>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('address') ? ' has-error' : ''); ?>">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="<?php echo e(old('address',$employee->address)); ?>" required>

                                <?php if($errors->has('address')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('address')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('phone_no') ? ' has-error' : ''); ?>">
                            <label for="phone_no" class="col-md-4 control-label">Phnoe number</label></label>

                            <div class="col-md-6">
                                <input id="phone_no" type="text" class="form-control" name="phone_no" value="<?php echo e(old('phone_no',$employee->phone_no)); ?>" required>

                                <?php if($errors->has('phone_no')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="status" class="col-md-4 control-label">status</label>

                            <div class="col-md-6">
                                <select class="form-control" name="status" value="<?php echo e(old('status',$employee->status)); ?>" required>
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

            
                      

                          
                        <div class="form-group<?php echo e($errors->has('status') ? ' has-error' : ''); ?>">
                            <label for="comp_id" class="col-md-4 control-label">Company Name</label>

                            <div class="col-md-6">

                            <select class="form-control" name="comp_id">

                                <?php foreach($companies as $company){ ?>
                                
                                    <option value="<?php echo e(old('comp_id',$employee->comp_id)); ?>"><?php echo e($company -> c_name); ?></option>
                              
                                <?php } ?>

                            </select>

                            <?php if($errors->has('company_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('company_id')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div> 
                     <div class="form-group<?php echo e($errors->has('no_of_emp') ? ' has-error' : ''); ?>">
                            <label for="dept_id" class="col-md-4 control-label">Depatment Name</label>

                            <div class="col-md-6">

                                <select class="form-control" name="dept_id">

                                  
                                <?php foreach($departments as $department) { ?>
                                
                                <option value="<?php echo e($department -> id); ?>"><?php echo e($department -> d_name); ?></option>
                          
                                <?php } ?>
                                        


                            </select>

                            <?php if($errors->has('dept_id')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('dept_id')); ?></strong>
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
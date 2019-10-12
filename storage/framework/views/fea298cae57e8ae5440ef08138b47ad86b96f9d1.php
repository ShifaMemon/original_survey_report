<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding:10px 15px;font-size:20px;text-transform: uppercase;"><b><?php echo $name;?></b>
                <?php if(Auth::user()->name=="purva"): ?>
                                
                <?php endif; ?>
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
<table class="table">

    <tr>
    <?php 
     foreach($surveys as $survey){  
    if($survey->company->c_name == Auth::user()->name)
    {   $bool_value = 1;
    }
    } 
          ?>
     <?php if(empty($bool_value)): ?>
          <h1 align="center" style="color:red;display: inline;">You Dont Have Any Survey</h1>
          
     <?php else: ?>
     <a href="<?php echo e(route('survey_insert')); ?>" class="btn btn-primary" style="align:center;display: inline;float:right">
                                   New Survey
                                </a>
     <tr>
        <th>ID</th>
        <th>SURVEY_TITLE</th>
        <th>START_DATE</th>
        <th>END_DATE</th>
        <th>COMPANY_NAME</th>
        <th>DESCRIPTION</th>
        <th>STATUS</th>
    <?php endif; ?>

    
      
    <?php if(Auth::user()->name!="purva"): ?>   <td colspan="2" style="text-align:justify"> <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACTION</b></td>  <?php endif; ?> 

    <tr>
   <?php  foreach($surveys as $survey){ 
       if($survey->company->c_name == Auth::user()->name)
       {?>
        
        

   <tr>
   <td><?php echo $survey -> id;?></td>
   <td><a href="<?php echo e(route('show_ques',[$survey->id])); ?>"> <?php  echo $survey -> survey_title;?></a></td>
   <td><?php echo $survey -> s_start_date;?></td>
    <td><?php echo $survey -> s_end_date;;?></td>
    <td><?php echo $survey->company->c_name;?></td>
    <td><?php  echo $survey -> desc;?></td>
    <td><?php echo $survey -> status;?></td>
     <?php if(Auth::user()->name!="purva"): ?>  
    <td>
           <a href="<?php echo e(route('survey_edit',[$survey->id])); ?>">edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="<?php echo e(route('survey_delete',[$survey -> id])); ?>">delete</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo e(route('ques_type')); ?>">Add</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;          
            <a href="<?php echo e(route('ques_preview',[$survey->id])); ?>">Show</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        
                            
    </td>
     <?php endif; ?> 
       <?php }
        ?>
    <?php } 
     ?> 
 
   </tr>


</table>


         <div class="col-md-8 col-md-offset-5"> <?php echo e($surveys->links()); ?></div> 
     
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
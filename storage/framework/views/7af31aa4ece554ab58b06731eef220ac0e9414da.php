<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding:10px 15px;font-size:20px;text-transform: uppercase;"><b><?php echo $name;?></b>
                </div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <table class="table">

    <tr>
    
          
        
     <a href="<?php echo e(route('survey_insert')); ?>" class="btn btn-primary" style="align:center;display: inline;float:right">
                                   New Survey
                                </a>
      <?php foreach( $all as $one) { ?>
     <?php if($one != "created_at" and $one != "updated_at" and $one != "token" and  $one != "password"): ?>
            <?php if(preg_match("/_id/",$one)): ?>
            <td style=" text-transform: uppercase;"><b><?php  echo preg_replace("/_id/", "_name", $one); ?></b></td>
            <?php else: ?>
           <td style=" text-transform: uppercase;"><b><?php echo e($one); ?></b></td>
           <?php endif; ?>
    <?php endif; ?> 
    <?php } ?>


    
      
    <?php if(Auth::user()->name!="purva"): ?>   <td colspan="2" style="text-align:justify"> <b> ACTION</b></td>  <?php endif; ?> 

    <tr>
   <?php  foreach($questions as $question){ 
      ?>
   <tr>
   <td>  <?php echo $question -> id;?></td>
   <td><?php echo $question-> survey_id; ?></td>
   <td><?php echo $question -> q_type;?></td>
    <td><?php echo $question -> ques;?></td>
    <td><?php  echo $question -> subpart;?></td>
     <?php if(Auth::user()->name!="purva"): ?>  
    <td>
           <a href="">edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="">delete</a> 
    </td>
     <?php endif; ?> 
       <?php }
        ?>

     
 
   </tr>


</table>


         <div class="col-md-8 col-md-offset-5"><?php echo e($questions->links()); ?></div> 
     
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
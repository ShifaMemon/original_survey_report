
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding:10px 15px;font-size:20px;text-transform: uppercase;"><b><?php echo $name;?></b>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">

    <tr>
    
          
        
     <a href="{{ route('survey_insert') }}" class="btn btn-primary" style="align:center;display: inline;float:right">
                                   New Survey
                                </a>
      <?php foreach( $all as $one) { ?>
     @if ($one != "created_at" and $one != "updated_at" and $one != "token" and  $one != "password")
            @if(preg_match("/_id/",$one))
            <td style=" text-transform: uppercase;"><b><?php  echo preg_replace("/_id/", "_name", $one); ?></b></td>
            @else
           <td style=" text-transform: uppercase;"><b>{{ $one }}</b></td>
           @endif
    @endif 
    <?php } ?>


    
      
    @if (Auth::user()->name!="purva")   <td colspan="2" style="text-align:justify"> <b> ACTION</b></td>  @endif 

    <tr>
   <?php  foreach($questions as $question){ 
      ?>
   <tr>
   <td>  <?php echo $question -> id;?></td>
   <td><?php echo $question-> survey_id; ?></td>
   <td><?php echo $question -> q_type;?></td>
    <td><?php echo $question -> ques;?></td>
    <td><?php  echo $question -> subpart;?></td>
     @if (Auth::user()->name!="purva")  
    <td>
           <a href="">edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a href="">delete</a> 
    </td>
     @endif 
       <?php }
        ?>

     
 
   </tr>


</table>


         <div class="col-md-8 col-md-offset-5">{{ $questions->links() }}</div> 
     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

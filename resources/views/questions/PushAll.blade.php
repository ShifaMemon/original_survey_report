@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">PREVIEW</div>

                <div class="panel-body" style="line-height:1">
                   <?php
                   $i = 0;
                   $q_type=array();
                   $ques=array();
                   $subpart=array();
                   //$subpart_arr=array();
                   foreach($questions as $question)
                   {  
                       $q_type[$i] = $question->q_type;
                       $ques[$i] = $question->ques;
                       $subpart[$i]=$question->subpart;
                       $i++;  
                       ?><br> <p style="font-weight:bold;"> <?php echo $i.')'; ?> {{ $question->ques }} </p>               
                      <?php  if($question->q_type == 'open ended'){
                              ?>  <input type="text" class="form-control"/><br> <?php
                               }
                               if($question->q_type == 'multiline_open_end'){
                                ?>  <textarea type="text" class="form-control"></textarea>
                                <?php
                              } ?>  <?php
                              if($question->q_type == 'checkbox'){
                                $subpart_arr = preg_split ("/\,/", $question->subpart);
                                foreach($subpart_arr as $arr)
                                {
                                  ?>  <input type="checkbox">{{ $arr }}<br><?php
                                }
                                ?><br>
                                
                                <?php
                              }

                              if($question->q_type == 'selection'){
                                $subpart_arr = preg_split ("/\,/", $question->subpart);
                                foreach($subpart_arr as $arr)
                                {
                                  ?>  <input type="radio">{{ $arr }}<br><?php
                                }
                                ?>  <br>
                                <?php
                              }
                   }
    
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

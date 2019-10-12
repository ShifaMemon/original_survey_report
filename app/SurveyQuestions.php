<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestions extends Model
{
    public $table = "all_questions";
    
    public $fillable = ['survey_id','q_type', 'ques', 'subpart'];

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}

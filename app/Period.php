<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    //
    public function routine() {
        return $this->belongsTo(ClassRoutine::Class, 'class_routine_id');
    }
}

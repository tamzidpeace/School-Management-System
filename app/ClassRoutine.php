<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassRoutine extends Model
{
    //
    public function section() {
        return $this->belongsTo(Section::Class);
    }

    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class);
    }
}

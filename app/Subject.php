<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class);
    }
}

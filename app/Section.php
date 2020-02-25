<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class);
    }
}

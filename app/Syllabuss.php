<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabuss extends Model
{
    //
    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class);
    }
}

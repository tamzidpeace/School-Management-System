<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PeriodsDetail extends Model
{
    //
    public function period() {
        return $this->belongsTo(Period::class);
    }
}

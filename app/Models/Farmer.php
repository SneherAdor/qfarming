<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}

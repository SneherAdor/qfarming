<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name', 'slug', 'area_id'
    ];

    public function area() {
        return $this->belongsTo(Area::class);
    }
}

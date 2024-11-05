<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Savol extends Model
{
    protected $fillable = [
        'title',
        'is_active'
    ];
    public function variants()
    {
        return $this->hasMany(Variant::class, 'savol_id', 'id'); 
    }
}

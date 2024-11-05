<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    protected $fillable=[
        'savol_id',
        'title'
    ];
    public function savol()
    {
        return $this->hasMany(Variant::class, 'savol_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Javob extends Model
{
    protected $fillable = [
        'user_ip',
        'savol_id',
        'variant_id'
    ];
    public function variant()
    {
        return $this->belongsTo(Variant::class, 'variant_id', 'id');
    }
}

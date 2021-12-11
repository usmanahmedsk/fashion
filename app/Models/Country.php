<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'iso', 'name', 'name_local', 'phone', 'image'
    ];
}

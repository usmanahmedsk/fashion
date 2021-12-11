<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'name', 'name_local', 'city_id'
    ];
}

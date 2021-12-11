<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'short_code', 'name', 'name_local','image'
    ];
}

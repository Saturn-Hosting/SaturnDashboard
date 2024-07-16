<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docker extends Model
{
    protected $fillable = [
        'name',
        'code',
    ];
    use HasFactory;
}

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

    public function getSizeAttribute()
    {
        $size = strlen($this->attributes['code']);
        if ($size > 1024 * 1024) {
            return round($size / 1024 / 1024, 2) . ' MB';
        }
        if ($size > 1024) {
            return round($size / 1024, 2) . ' KB';
        }
        return $size . ' B';
    }

    use HasFactory;
}

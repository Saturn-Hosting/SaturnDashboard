<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'host',
        'port',
        'user',
        'password',
        'status',
        'private_key',
    ];

    public function node()
    {
        return $this->belongsTo(Node::class);
    }
}

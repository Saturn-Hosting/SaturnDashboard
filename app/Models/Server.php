<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DivineOmega\SSHConnection\SSHConnection;

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

    public function executeCommand($command)
    {
        if ($this->private_key) {
            return "No private key support yet.";
        }
        $conn = (new SSHConnection())
            ->to($this->host)
            ->onPort($this->port)
            ->as($this->user)
            ->withPassword($this->password)
            ->connect();
        $command = $conn->run($command);
        return $command->getOutput();
    }
}

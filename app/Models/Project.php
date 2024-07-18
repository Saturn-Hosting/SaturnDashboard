<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'server_id',
        'docker_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function node()
    {
        return $this->server->node;
    }

    public function docker()
    {
        return $this->belongsTo(Docker::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = bin2hex(random_bytes(32));
            $cmd = 'mkdir -p projects/' . $project->user_id . '/' . $project->slug;
            $cmd = $cmd . ' && cd projects/' . $project->user_id . '/' . $project->slug;
            $cmd = $cmd . ' && touch Dockerfile';
            $cmd = $cmd . ' && echo "' . $project->docker->code . '" > Dockerfile';
            $cmd = $cmd . ' && echo "'.$project->server->password.'" | sudo -S docker build -t ' . $project->docker->name . ' .';
            $cmd = $cmd . ' && echo "'.$project->server->password.'" | sudo -S docker run -d --name ' . $project->slug . ' -it ' . $project->docker->name;
            $project->server->executeCommand($cmd);
        });
    }

    public function executeInDocker($command)
    {
        $cmd = 'echo "' . $this->server->password . '" | sudo -S docker exec -it ' . $this->slug . ' ' . $command;
        $this->server->executeCommand($cmd);
        $cmd = 'echo "' . $this->server->password . '" | sudo -S docker logs -it ' . $this->slug;
        return $this->server->executeCommand($cmd);
    }
}

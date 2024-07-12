<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Node;
use App\Models\Server;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ssh:test {arg}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks whether a connection over SSH can be made.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arg = $this->argument('arg');
        $parts = explode('.', $arg);
        if (count($parts) !== 2) {
            $this->error('Invalid argument.');
            return;
        }
        $node = $parts[0];
        $server = $parts[1];
        $node = Node::where('name', $node)->first();
        if (!$node) {
            $this->error('Node not found.');
            return;
        }
        $server = $node->servers()->where('name', $server)->first();
        if (!$server) {
            $this->error('Server not found.');
            return;
        }
        $output = $server->executeCommand('echo "test"');
        if ($output == "test") {
            $server->status = 1;
        } else {
            $server->status = 0;
        }
        $server->save();
        echo $output;
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Node;
use App\Models\Server;
use Illuminate\Console\Command;
use Spatie\Ssh\Ssh;

class verify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'server:verify {server}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verify server connection.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $server = $this->argument('server');
        if (empty($server)) {
            echo 'Server name is required.';

            return;
        }
        // split by .
        $server = explode('.', $server);
        if (count($server) !== 2) {
            echo 'Invalid server name.';

            return;
        }
        $node = Node::where('name', $server[0])->first();
        if (empty($node)) {
            echo 'Node not found.';

            return;
        }
        $server = Server::where('name', $server[1])->first();
        if (empty($server)) {
            echo 'Server not found.';

            return;
        }
        $process = Ssh::create($server->user, $server->host)->usePort($server->port)->execute('ls');
        echo $process->getOutput();
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Node;
use App\Models\Server;
use Illuminate\Console\Command;
use SaturnHosting\SSHConnection\SSHConnection;

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

        if ($server->private_key) {
            // make $server->host-key.txt
            $path = storage_path('app/'.$server->node->name.'/'.$server->name.'/private-key.txt');
            if (! file_exists($path)) {
                mkdir(dirname($path), 0755, true);
            }
            file_put_contents($path, $server->private_key);
            echo file_get_contents($path);
            $connection = (new SSHConnection())
                ->to($server->host)
                ->onPort($server->port)
                ->as($server->user)
                ->withPrivateKey($path)
                ->connect();
        } elseif ($server->password) {
            $connection = (new SSHConnection())
                ->to($server->host)
                ->onPort($server->port)
                ->as($server->user)
                ->withPassword($server->password)
                ->connect();
        } else {
            return 'Server credentials not found.';
        }
        $command = $connection->run('echo "Hello world!"');
        echo $command->getOutput();
        $server->status = $success;
        $server->save();
    }
}

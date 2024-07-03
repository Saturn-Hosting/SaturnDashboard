<?php

namespace App\Console\Commands;

use App\Models\Node;
use App\Models\Server;
use Illuminate\Console\Command;
use phpseclib\Net\SSH2;

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
        $ssh = new SSH2($server->ip, $server->port);
        if (! $ssh) {
            throw new RuntimeException('Unable to connect to server.');
        }
        if ($server->private_key) {
            $key = new RSA();
            $key->loadKey($server->private_key);
            $authenticated = $ssh->login($server->user, $key);
            if (! $authenticated) {
                throw new RuntimeException('Unable to authenticate with public-private key pair.');
            }
        } elseif ($server->password) {
            $authenticated = $ssh->login($server->user, $server->password);
            if (! $authenticated) {
                throw new RuntimeException('Unable to authenticate with password.');
            }
        }
        echo 'Server connection verified.';
        $server->status = $success;
        $server->save();
    }
}

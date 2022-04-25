<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class mqttsub extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqttsub';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mqtt = MQTT::connection();
        $mqtt->subscribe('locker/status', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
        }, 0);
        $mqtt->loop(true);
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\Facades\MQTT;

class mqttManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mqttManager';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check mqtt broker status';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $mqtt = MQTT::connection();
            $mqtt->registerLoopEventHandler(function ($mqtt, float $elapsedTime) {
                if ($elapsedTime >= 7) {
                    $mqtt->interrupt();
                }
            });
            $mqtt->publish('locker/unlock', "", 0);
            $mqtt->loop(true);
        } catch (\Exception $e) {
            echo sprintf($e->getMessage());
        }
        return 1;
    }
}

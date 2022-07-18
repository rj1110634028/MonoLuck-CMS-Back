<?php

namespace App\Console\Commands;

use GrahamCampbell\ResultType\Success;
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
            while (true) {
                $mqtt->publish('locker/test', "test", 1);
                print("loading...\n");
                $mqtt->loop(true, true);
                print("success\n");
                sleep(3);
            }
        } catch (\Exception $e) {
            print("failed\n");
            echo sprintf($e->getMessage());
            system("sudo systemctl restart mosquitto");
        }
        return 1;
    }
}

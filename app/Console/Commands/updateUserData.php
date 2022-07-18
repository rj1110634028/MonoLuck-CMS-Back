<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class updateUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateUserData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update or create mono\'s users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $response = Http::get('https://script.google.com/macros/s/AKfycby-ihROmlQHLMymSvIaoYwBJ27cHty5DZccYKMYAG7TJA8ersq-5w0o3yVD90HtIJF0ew/exec?_token=' . env('MSC_API_TOKEN'));

        $response = Http::get('https://script.googleusercontent.com/macros/echo?user_content_key=' . env('MONO_USERS_CONTENT_KEY') . '&lib=MarRgyJP_N7ONJjY9Humgro5-eSn5sfmS');
        $users = $response->json()["users"];
        foreach ($users as $key => $user) {
            // dd($user["cardId"]);
            if (preg_match("/^09\d{8}$/", $user['phone'])) {
                $user['phone'] = "886" . ltrim($user['phone'], "0");
            }
            $user = User::updateOrCreate(
                ['mail' => $user["email"]],
                [
                    "name" => $user["name"],
                    "phone" => $user["phone"],
                    "cardId" => $user["cardId"],
                ]
            );
        }
        return 0;
    }
}

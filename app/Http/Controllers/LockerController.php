<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use PhpMqtt\Client\Facades\MQTT;
use Illuminate\Support\Facades\Validator;

class LockerController extends Controller
{
    public function unlock(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'lockerNo' => 'required|exists:lockers',
                'description' => 'required',
            ],
        );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        try {
            $locker = Locker::where('lockerNo', '=', $request['lockerNo']);

            $token = $request->header('token');
            $rootuser = User::where('remember_token', '=', $token)->first();

            $lockerResponse = "";
            $mqtt = MQTT::connection();
            $mqtt->subscribe('locker/unlock', function (string $topic, string $message) use ($mqtt, $locker, &$lockerResponse) {
                $arrayMessage = explode(",", $message);
                if ($arrayMessage[0] == $locker->first()->lockerEncoding && $arrayMessage[1] != null) {
                    $lockerResponse = $arrayMessage[1];
                    $mqtt->interrupt();
                }
            }, 0);
            $mqtt->registerLoopEventHandler(function ($mqtt, float $elapsedTime) {
                if ($elapsedTime >= 7) {
                    $mqtt->interrupt();
                }
            });
            $mqtt->publish('locker/unlock', $locker->first()->lockerEncoding, 0);
            $mqtt->loop(true);

            if ($lockerResponse == 0) {
                $record = new Record;
                $record->description = $request['description'];
                $record->userId = $rootuser->id;
                $record->lockerId = $locker->first()->id;
                $record->save();
                $locker->update(['error' => 0]);
                $locker->update(['lockUp' => 0]);
                return response("success", 200);
            } elseif ($lockerResponse == 1) {
                $locker->update(['error' => 1]);
                Log::channel('myError')->error("Unlock Fail in " . __FILE__ . ":" . __LINE__);
                return response("Unlock Fail", 500);
            } else {
                $locker->update(['error' => 1]);
                Log::channel('myError')->error("Locker No Response Or Response ERROR in " . __FILE__ . ":" . __LINE__);
                return response("Locker ERROR", 500);
            }
        } catch (\Exception $e) {
            return response($e->getMessage(), 422);
        }
    }

    public function RPIunlock(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'cardId' => 'required|exists:users',
            ],
        );
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        try {
            $user = User::where('cardId', '=', $request['cardId'])->first();
            $locker = Locker::where('userId', '=', $user->id)->first();
            if ($locker != NULL) {
                $record = new Record;
                $record->userId = $user->id;
                $record->lockerId = $locker->id;
                $record->save();
                // MQTT::publish('locker/unlock', $locker->lockerEncoding);

                return response($locker->lockerEncoding, 200);
            } else return response("lockererror", 400);
        } catch (\Exception $e) {
            return response($e->getMessage(), 422);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locker = Locker::orderBy('id', 'asc')->get(['id', 'lockerNo', 'lockUp', 'userId', 'error']);
        return response($locker, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function show(locker $locker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function edit(locker $locker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, locker $locker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function destroy(locker $locker)
    {
        //
    }
}

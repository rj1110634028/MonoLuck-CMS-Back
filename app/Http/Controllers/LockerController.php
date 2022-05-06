<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Models\User;
use App\Models\Record;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class LockerController extends Controller
{
    public function unlock(Request $request)
    {
        $user = User::where('cardId', '=', $request['cardId'])->first();
        if ($user != NULL) {
            $locker = Locker::where('userId', '=', $user->id)->first();
            if ($locker != NULL) {
                $token = $request->header('token');
                $rootuser = User::where('remember_token', '=', $token)->first();
                $record = new Record;

                if ($token == 'hP4VspmxA6YtIltVtzXioPY3xixgrvxLTMpvkkefWpRjmgpRMdGZ1FtoWWNx') {
                    $record->userId = $user->id;
                } else if ($request['description'] == null) {
                    return response("descriptionIsNull", 400);
                } else {
                    $record->description = $request['description'];
                    $record->userId = $rootuser->id;
                }
                $record->lockerId = $locker->id;
                $record->save();
                MQTT::publish('locker/unlock', $locker->lockerEncoding);

                return response("success", 200);
            } else return response("lockererror", 400);
        } else return response("cardIderror", 400);
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

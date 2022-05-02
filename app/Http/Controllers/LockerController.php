<?php

namespace App\Http\Controllers;

use App\Models\locker;
use App\Models\user;
use App\Models\record;
use Illuminate\Http\Request;
use PhpMqtt\Client\Facades\MQTT;

class LockerController extends Controller
{
    public function unlock(Request $request)
    {
        $user = user::where('cardId', '=', $request['cardId'])->first();
        if ($user != NULL) {
            $locker = locker::where('userId', '=', $user->id)->first();
            if ($locker != NULL) {
                $token = $request->header('token');
                $rootuser = user::where('remember_token', '=', $token)->first();
                $record = new record;

                if ($request['description'] != null) {
                    $record->description = $request['description'];
                    $record->userId = $rootuser->id;
                } else if ($rootuser->permission == 0) {
                    return response("descriptionIsNull", 400);
                } else {
                    $record->userId = $user->id;
                }
                $record->lockerId = $locker->id;
                $record->save();
                MQTT::publish('locker/unlock', $locker->lockerEncoding);

                return response("success", 200);
            } else return response("error", 400);
        } else return response("error", 400);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locker = locker::orderBy('id', 'asc')->get(['id', 'lockerNo', 'lockUp', 'userId', 'error']);
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
     * @param  \App\Models\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function show(locker $locker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\locker  $locker
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
     * @param  \App\Models\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, locker $locker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\locker  $locker
     * @return \Illuminate\Http\Response
     */
    public function destroy(locker $locker)
    {
        //
    }
}

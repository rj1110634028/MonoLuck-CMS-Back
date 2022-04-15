<?php

namespace App\Http\Controllers;

use App\Models\locker;
use App\Models\user;
use Illuminate\Http\Request;

class LockerController extends Controller
{
    public function lockup(Request $request)
    {
        $user = user::where('cardId', '=', $request['somekey'])->first();
        if ($user != NULL) {
            $locker = locker::where('userId', '=', $user->id)->first();
            if ($locker != NULL) {
                return response($locker->lockerEncoding, 200);
            } else {
                return response("error", 400);
            }
        } else {
            return response("error", 400);
        }
    }

    public function locker()
    {
        $locker = locker::orderBy('lockerNo','asc')->get(['lockerNo','lockUp','userId']);
        return response($locker, 400);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

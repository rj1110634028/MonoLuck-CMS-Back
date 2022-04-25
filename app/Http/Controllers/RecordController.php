<?php

namespace App\Http\Controllers;

use App\Models\record;
use App\Models\locker;
use App\Models\user;
use Illuminate\Http\Request;

class RecordController extends Controller
{

    public function record(Request $request)
    {
        if ($request["lockerNo"] == null) {
            return response("lockerNo is null", 400);
        } else {
            $locker = locker::where("lockerNo", "=", $request["lockerNo"])->first();
            if ($locker == null) {
                return response("lockerNo error" . $request["lockerNo"], 400);
            } else {
                $records = record::where("lockerId", "=", $locker->id)->get(['userId', 'created_at AS time', 'description']);
                $user = user::where("id", "=", $locker->userId)->first(['id', 'name', 'email', 'phone', 'cardId']);
                if ($user == null) {
                    return response("didn't have user", 400);
                } else {
                    return response()->json(["user" => $user, "records" => $records], 200);
                }
            }
        }
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
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(record $record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(record $record)
    {
        //
    }
}

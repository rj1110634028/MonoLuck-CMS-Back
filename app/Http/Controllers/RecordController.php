<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Locker;
use App\Models\User;
use Illuminate\Http\Request;


class RecordController extends Controller
{

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
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function show(Record $record, $lockerNo)
    {
        if ($lockerNo == null) {
            return response("lockerNo is null", 400);
        } else {
            $locker = Locker::where("lockerNo", "=", $lockerNo)->first();
            if ($locker == null) {
                return response("lockerNo error" . $lockerNo, 400);
            } else {
                $records = Record::select([
                    'created_at AS time',
                    'description',
                    'userId'
                ])->with('user:id,name,permission')->where("lockerId", "=", $locker->id)->orderByDesc('created_at')->get();
                $user = User::where("id", "=", $locker->userId)->first(['id', 'name', 'email', 'phone', 'cardId']);
                if ($user == null) {
                    return response("didn't have user", 400);
                } else {
                    return response()->json(["user" => $user, "records" => $records], 200);
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function edit(Record $record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Record $record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Record  $record
     * @return \Illuminate\Http\Response
     */
    public function destroy(Record $record)
    {
        //
    }
}

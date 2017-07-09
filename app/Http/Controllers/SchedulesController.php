<?php

namespace App\Http\Controllers;

use App\Interaction;
use App\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'meeting_time' => 'required',
            'reminder_time' => 'required',
        ]);

        $meeting_time = Carbon::createFromTimestamp(request('meeting_time'))->toDateTimeString();
//        $meeting_time = $meeting_time->toDateTimeString();

        $reminder_time = new Carbon();


        if($meeting_time == 1){
            $reminder_time = $meeting_time->subHours(1);
        }
        else if($meeting_time == 2){
            $reminder_time = $meeting_time->subHours(2);
        }
        else if($meeting_time == 5){
            $reminder_time = $meeting_time->subHours(5);
        }
        else if($meeting_time == 6){
            $reminder_time = $meeting_time->subHours(6);
        }
        else if($meeting_time == 12){
            $reminder_time = $meeting_time->subHours(12);
        }
        else if($meeting_time == 24){
            $reminder_time = $meeting_time->subHours(24);
        }


        $interaction = Interaction::findOrFail($id);

        $schedule = Schedule::create([
            'interaction_id' => $interaction->id,
            'meeting_time' => request('meeting_time'),
            'reminder_time' => $reminder_time,
        ]);

        //sweet alert
        alert()->success('You have scheduled an interaction', 'CRM')->autoclose(2000);

        return redirect('/interactions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        //
    }
}

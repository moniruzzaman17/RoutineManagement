<?php

namespace App\Http\Controllers\admin\period;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Period;
use App\Shift;

class PeriodController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application period.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $periods = Period::all();
        $shifts = Shift::all();
        return view('admin.period.period', compact('periods','shifts'));
    }
    /**
     * Add Period Information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function addPeriod(Request $request)
    {
        $Messages = [
            'periodName.required' => 'Period Name is required',
            'startTime.required' => 'Start Time is required',
            'duration.required' => 'Period Duration is required',
            'shift.required' => 'Shift is required',
        ];

        $validatedData = $request->validate([
            'periodName' => 'required',
            'startTime' => 'required',
            'duration' => 'required',
            'shift' => 'required',
            'remarks' => 'nullable',
        ],$Messages);

        $periodName = request('periodName');
        $startTime = request('startTime');
        $duration = request('duration');
        $endTime = date("H:i", strtotime("+ ".$duration." Minutes",strtotime(request('startTime'))));
        // $endTime = date("h:i:s A", strtotime("+ ".$duration." Minutes",strtotime(request('startTime'))));

        // dd($startTime, $endTime);
        $shiftId = request('shift');
        $remarks = request('remarks');


        $periodAssigned = Period::where('period_name',$periodName)
        ->where('shift_id',$shiftId)
                          // ->where(function($q) use ($startTime,$endTime){
                          //   $q->where('Cab', 2)
                          //       ->orWhere('Cab', $variable);})
        ->get();
        if(count($periodAssigned) > 0)
        {
            // dd($sectionAssigned);
            return redirect()->route('period',session()->getId())->with('error', 'Requested period alredy assigned');
        }
        $period = new Period;
        $period->period_name = $periodName;
        $period->shift_id = $shiftId;
        $period->start_time = $startTime;
        $period->end_time = $endTime;
        $period->duration = $duration;
        $period->remarks = $remarks;

        if ($period->save()) {
            return redirect()->route('period',session()->getId())->with('success', 'Period information has been added');
        }
    }
    /**
     * Update Period Information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {
        $Messages = [
            'startTime.required' => 'Start Time is required',
            'duration.required' => 'Period Duration is required',
        ];

        $validatedData = $request->validate([
            'startTime' => 'required',
            'duration' => 'required',
            'remarks' => 'nullable',
        ],$Messages);

        $startTime = request('startTime');
        $duration = request('duration');
        $endTime = date("H:i", strtotime("+ ".$duration." Minutes",strtotime(request('startTime'))));
        // $endTime = date("h:i:s A", strtotime("+ ".$duration." Minutes",strtotime(request('startTime'))));

        // dd($startTime, $endTime);
        $remarks = request('remarks');

        $period=Period::find(request('periodId'));
        $period->update([
            'start_time' => $startTime,
            'end_time' => $endTime,
            'duration' => $duration,
            'remarks' => $remarks,
        ]);
        if ($period) {
            return redirect()->route('period',session()->getId())->with('success', 'Period has been Updated');
        } 
    }

    /**
     * Remove section information.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove(Request $request)
    {
        $period=Period::find(request('periodId'));
        if ($period->delete()) {
            $periods = Period::orderBy('entity_id', 'asc')->get();
            return view('admin.period.ajaxPeriodTable',compact('periods'))->with('success','Period has been removed');
        }
    }
}

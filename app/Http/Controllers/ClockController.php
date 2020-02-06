<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Employees;
use App\Model\Logs;

class ClockController extends Controller
{
    public function showClock() {

        $employees = Employees::all();
        return view('clock', compact('employees'));
    }

    public function clockin(Request $request) {
        $emp = Employees::where('id', $request->employee_id )
            ->find($request->employee_id);
        $emp->status = "in";
        $emp->save();
        $logs = new Logs($request->input());
        $logs->save();
        session(['logId' => $logs->id]);
        return redirect()->back()->with('success', 'Time in');
    }

    public function clockout(Request $request) {
        $log = Logs::where('employee_id', $request->employee_id )
            ->where('id', $request->session()->get('logId'))
            ->get();
        $log->clock_out = $request->clock_out;
        $log->save();
        return redirect()->back()->with('success', 'Time in');
    }

    public function startBreak(Request $request) {
        
    }
}

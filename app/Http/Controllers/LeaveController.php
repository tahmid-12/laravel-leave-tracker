<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;
class LeaveController extends Controller
{
    //
    // public function index()
    // {
    //     $leaveHistory = Leave::all(); 
    //     $userId = Auth::id();
        
    //     $leaveHistory = Leave::where('user_id', $userId)->get();
    //     return view('home', ['leaveHistory' => $leaveHistory]);
    // }
    
public function index()
{
    $userId = Auth::id();


    $leaveHistory = Leave::where('user_id', $userId)->get();

    // Count pending, accepted, and rejected leave requests
    $pendingCount = $leaveHistory->where('status', 'pending')->count();
    $acceptedCount = $leaveHistory->where('status', 'approved')->count();
    $rejectedCount = $leaveHistory->where('status', 'rejected')->count();

    return view('home', [
        'leaveHistory' => $leaveHistory,
        'pendingCount' => $pendingCount,
        'acceptedCount' => $acceptedCount,
        'rejectedCount' => $rejectedCount,
    ]);
}
    public function submitLeave(Request $request)
    {

        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        $start = \Carbon\Carbon::parse($validatedData['start_date']);
        $end = \Carbon\Carbon::parse($validatedData['end_date']);
        $duration = $end->diffInDays($start);

   
        $leave = new Leave();
        $leave->user_id = auth()->user()->id; 
        $leave->start_date = $validatedData['start_date'];
        $leave->end_date = $validatedData['end_date'];
        $leave->duration = $duration;
        $leave->reason = $validatedData['reason'];
        $leave->status = 'pending'; 
        $leave->save();

        return redirect()->back()->with('success', 'Leave submitted successfully!');
    }
      public function approveLeave($id)
    {
   
        $leave = Leave::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();

      
        Mail::to($leave->user->email)->send(new LeaveApproved($leave));

       return('layouts/admin');
    }

    public function rejectLeave($id)
    {

        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();


        Mail::to($leave->user->email)->send(new LeaveRejected($leave));


        return('layouts/admin');
    }
}


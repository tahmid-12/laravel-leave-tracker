<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view('layouts/admin', compact('leaves'));
    }

    public function approveLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();
        return redirect()->back()->with('success', 'Leave request approved successfully.');
    }

    public function rejectLeave($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();
        return redirect()->back()->with('success', 'Leave request rejected successfully.');
    }

    public function adminPage(){
        return view('adminLogIn');
    }
    
    public function adminLogIn(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(['email' => 'admin@gmail.com', 'password' => '1234'])) {
            return view('layouts/admin');
        } else {

            return view('adminLogIn');
        }
    }


}

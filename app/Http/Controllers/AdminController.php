<?php

namespace App\Http\Controllers;

use App\Models\AddEvent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function viewEvent(){

        $event =AddEvent::all();

        return view('admin.view_event', compact('event'));   
    }
    public function statusApproveReject(Request $request,$requestid ,$event_status)
{      
            
            $evtstatus = AddEvent::where('id', $requestid)->first();
            $evtstatus->status = $event_status;
            $evtstatus->update();
            $actions = 'Event Status Updated Succesfully!!';
            return $actions;
        }
    }


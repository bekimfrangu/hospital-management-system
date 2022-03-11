<?php

namespace App\Http\Controllers;

use App\Models\Apointment;
use App\Models\Doctor;
use App\ModelS\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function redirect() {
        if(Auth::id())
        {
                if(Auth::user()->utype == '0') {
                   $doctors = Doctor::all(); 
                   return view('user.home',compact('doctors'));
                } else {
                    
                    return view('admin.home');
                }
        } else {
            return redirect()->back();
        }
    }

    public function index() {
        if(Auth::id())
        {
            return redirect('home');
            
        } else {
            
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));
        }
    }

    public function appointment(Request $request) 
    {
        $data = new Apointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';
        if(Auth::id())
        {   
            $data->user_id = Auth::user()->id;
        }

        if($data->save()) 
        {
            return redirect()->back()->with('successAppo', 'You have make an appointment.Soon we will call you!');
        } else {
            return redirect()->back()->with('errorAppo', 'Sorry, something went wrong. Try again later!');
        }
    }

    public function myappointment() 
    {
        if(Auth::id())
        {
            $user_id = Auth::user()->id;
            $appointments = Apointment::where('user_id', $user_id)->get();
            return view('user.my_appointment', compact('appointments'));
        } else 
        {
            return redirect()->back();
        }
        
    }

    public function cancel_appointment($id) 
    {
            $cappo = Apointment::findorFail($id);
            if($cappo->delete())
            {
                return redirect()->back()->with('successDelAppo', 'The appointment has been canceled.');
            } else {
                return redirect()->back()->with('errorDelAppo', 'The appointment has not been canceled. Try again!');
            }
    }
}

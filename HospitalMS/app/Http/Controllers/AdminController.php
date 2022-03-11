<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Users

    public function userview() {
        $users = User::where('utype', 0)->get();
        $admins = User::where('utype', 1)->get();
        return view('admin.userview', compact('users', 'admins'));
    }
    public function storeUser(Request $request) {
       
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->utype = $request->utype;

        if($user->save())
         {
                return redirect()->back()->with('successUser', 'User has been added successfully!');
         } else {
                return redirect()->back()->with('errorUser', 'Something went wrong!');       
         }
    }
    
    
    
    //Doctors
    public function addview() {
        return view('admin.add_doctor');
    }

   
    public function storeDoctor(Request $request) {
       
        $doctor = new Doctor;
    
        $image = $request->image;
        $imageName = time(). '.'. $image->getClientoriginalExtension();
        $request->image->move('doctorImage', $imageName);
        $doctor->image = $imageName;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;

        if($doctor->save())
         {
                return redirect()->back()->with('successDoc', 'Doctor has been added successfully!');
         } else {
                return redirect()->back()->with('errorDoc', 'Something went wrong!');       
         }
    }
}

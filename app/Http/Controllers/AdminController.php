<?php

namespace App\Http\Controllers;

use App\Models\Apointment;
use App\Models\Doctor;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Users
    public function userview() {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $id = Auth::user()->id;
                     $userProfile = User::find($id);

                     $users = User::where('utype', 0)->get();
                     $admins = User::where('utype', 1)->get();
                     return view('admin.userview', compact('users', 'admins', 'userProfile'));
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
       
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

    public function updateUserView($id) 
    {
           if(Auth::id())
           {
                  if(Auth::user()->utype == 1)
                     {
                            $user = User::findorFail($id);

                            $id = Auth::user()->id;
                            $userProfile = User::find($id);
                             return view('admin.updateUserView', compact('user', 'userProfile'));
                  } else {
                         return redirect()->back();
                  }
           } else {
                  return redirect('login');
           }
     
    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findorFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->utype = $request->utype;

        if($user->save())
         {
                return redirect()->back()->with('successUpdateUser', 'User has been updated successfully!');
         } else {
                return redirect()->back()->with('errorUpdateUser', 'Something went wrong!');       
         }
    }
    public function deleteUser($id)
    {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {      
                  $user = User::findorFail($id);
                     if($user->delete())
                     {
                            return redirect()->back()->with('successDelUser', 'User has been deleted successfully!');
                     } else {
                            return redirect()->back()->with('errorDelUser', 'Something went wrong!');       
                     }
                     
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }

      
    }
    
    public function updateAdminView($id) 
    {
           if(Auth::id())
           {
                  if(Auth::user()->utype == 1)
                     {
                            $user = User::findorFail($id);

                            $id = Auth::user()->id;
                            $userProfile = User::find($id);
                             return view('admin.updateAdminView', compact('user', 'userProfile'));
                  } else {
                         return redirect()->back();
                  }
           } else {
                  return redirect('login');
           }
     
    }

    public function updateAdmin(Request $request, $id)
    {
        $user = User::findorFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;

        if($user->save())
         {
                return redirect()->back()->with('successUpdateAdmin', 'Admin has been updated successfully!');
         } else {
                return redirect()->back()->with('errorUpdateAdmin', 'Something went wrong!');       
         }
    }
    
    
    //Doctors
    public function addview() {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $id = Auth::user()->id;
                     $userProfile = User::find($id);


                   $data = Doctor::all();
                     return view('admin.add_doctor', compact('data','userProfile'));
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
     
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

    public function updateDoc($id)
    {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              { 
                      $doctor = Doctor::findorFail($id);
                      
                     $id = Auth::user()->id;
                     $userProfile = User::find($id);

                    
                     return view('admin.updateDoctor', compact('doctor', 'userProfile'));
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
          
    }

    public function updateDoctor(Request $request, $id)
    {
       $doctor = Doctor::findorFail($id);

       
       $image = $request->file;
       $imageName = time(). '.'. $image->getClientoriginalExtension();
       $request->file->move('doctorImage', $imageName);
       $doctor->image = $imageName;

       $doctor->name = $request->name;
       $doctor->phone = $request->phone;
       $doctor->speciality = $request->speciality;

       if($doctor->save())
        {
               return redirect()->back()->with('successEditDoc', 'Doctor has been updated successfully!');
        } else {
               return redirect()->back()->with('errorEditDoc', 'Something went wrong!');       
        }

    }

    public function deleteDoc($id)
    {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $doctor = Doctor::findorFail($id);
                            if($doctor->delete())
                            {
                                   return redirect()->back()->with('successDelDoc', 'Doctor has been deleted successfully!');
                            } else {
                                   return redirect()->back()->with('errorDelDoc', 'Something went wrong!');       
                            }
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
       
    }
    public function searchDoctor(Request $request) 
    {  
      if(Auth::user()->utype == 1)
        {
            $search = $request->search;
            $data = Doctor::where('name', 'Like', '%'.$search.'%')->get();
            $id = Auth::user()->id;
            $userProfile = User::find($id);
            return view('admin.add_doctor', compact('data','userProfile'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }


    //Appointments
    public function showAppointments()
    {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $id = Auth::user()->id;
                     $userProfile = User::find($id);

                    $data = Apointment::orderBy('id', 'DESC')->get();
                     return view('admin.showAppointment', compact('data','userProfile'));
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
         
    }

    public function approveAppoint($id)
     {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $data = Apointment::findorFail($id);
                     $data->status = 'Approved';
                     $data->save();

                     return redirect()->back();
                     
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
         
     }
     
    public function cancelAppoint($id)
    {
       if(Auth::id())
       {
              if(Auth::user()->utype == 1)
              {
                     $data = Apointment::findorFail($id);
                     $data->status = 'Canceled';
                     $data->save();

                     return redirect()->back();
              } else {
                     return redirect()->back();
              }
       } else {
              return redirect('login');
       }
      
    }

    public function emailView($id)
    {

           $data = Apointment::findorFail($id);

           $id = Auth::user()->id;
           $userProfile = User::find($id);

           return view('admin.email_view', compact('data', 'userProfile'));
    }

    public function sendMail(Request $request, $id)
    {
       $data = Apointment::findorFail($id);
       $details = [
              'greeting'=> $request->greeting,
              'body'=> $request->body,
              'actionText'=> $request->actionText,
              'actionUrl'=> $request->actionUrl,
              'endPart'=> $request->endPart
       ];

       Notification::send($data, new SendEmailNotification($details));

   
       return redirect()->back()->with('sucessSendMail', 'Email was sent successfully!');
    }

    public function searchAppointment(Request $request) 
    {  
      if(Auth::user()->utype == 1)
        {
            $search = $request->search;
            $data = Apointment::where('name', 'Like', '%'.$search.'%')->get();
            $id = Auth::user()->id;
            $userProfile = User::find($id);
            return view('admin.showAppointment', compact('data','userProfile'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}

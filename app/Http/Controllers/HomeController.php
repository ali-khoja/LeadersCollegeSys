<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $studentsld = Student::where( 'branch' , 'lawaan_diploma' )->where('statue' , 'active')->get();
        $studentslv = Student::where( 'branch' , 'lawan_vocational' )->where('statue' , 'active')->get();
        $studentsb = Student::where( 'branch' , 'brayati' )->where('statue' , 'active')->get();
        $courseslv = Course::where( 'branch' , 'lawan_vocational' )->get();
        $coursesld = Course::where( 'branch' , 'lawan_diploma' )->get();
        $coursesb = Course::where( 'branch' , 'brayati' )->get();

            return view('home', compact('studentsld' , 'studentslv' , 'studentsb' , 'courseslv' , 'coursesld' , 'coursesb'));

    }

    /**
     * PROFILE
     */
    public function profile()
    {
        return view('profile.index');
    }

    public function profileEdit()
    {
        return view('profile.edit');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id()
        ]);

        if ($request->hasFile('profile_picture')) {
            $profile = Str::slug(auth()->user()->name).'-'.auth()->id().'.'.$request->profile_picture->getClientOriginalExtension();
            $request->profile_picture->move(public_path('images/profile'), $profile);
        } else {
            $profile = 'avatar.png';
        }

        $user = auth()->user();

        $user->update([
            'name'              => $request->name,
            'password'              => bcrypt($request->get('password')),
            'email'             => $request->email,
            'profile_picture'   => $profile
        ]);

        return redirect()->route('profile');
    }

    /**
     * CHANGE PASSWORD
     */
    public function changePasswordForm()
    {
        return view('profile.changepassword');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            return back()->with([
                'msg_currentpassword' => 'Your current password does not matches with the password you provided! Please try again.'
            ]);
        }
        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with([
                'msg_currentpassword' => 'New Password cannot be same as your current password! Please choose a different password.'
            ]);
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword'     => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    use AuthenticatesUsers;

    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function checkLogin(LoginRequest $request)
    {
        if(Auth::guard('admin')->attempt(['email' => $request->email , 'password' => $request->password]))
        {
            return redirect()->intended('admin/admin-dashboard');
        }
        
        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function dashboard()
    {
        $courses_count             = DB::table('courses')->count();
        $published_courses_count   = DB::table('courses')->where('displayed',1)->count();
        $unpublished_courses_count = $courses_count - $published_courses_count;
        return view('admin.dashboard.dashboard',compact('courses_count','published_courses_count','unpublished_courses_count'));
    }

    public function profile()
    {
        return view('admin.profile.profile');
    }

    public function update_profile(Request $request)
    {
        $admin = Admin::findOrFail($request->id);

        $admin->name     = $request->name;
        $admin->email    = $request->email;
        $admin->password = Hash::make($request->password); 
        $admin->update();

        session()->flash('update', 'success');

        return redirect()->back();
    }
}

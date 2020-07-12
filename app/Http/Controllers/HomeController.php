<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Hash;
use App\User;

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
        return view('home');
    }

    public function profile(){
        $data = array(
            'js'=>array(
                'assets/js/jquery.validate.js',
                'assets/js/additional-methods.min.js',
                'assets/js/custom/userProfile.js',
            ),
        );
        return view('profile')->with('additionalResources',$data);
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'cnfpassword'=>'required',
            'profilePic' =>'nullable|mimes:jpeg,png,jpg,svg|max:10000'
        ]);

        if($request->hasFile('profilePic')){
            $filenameWithExt = $request->file('profilePic')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('profilePic')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('profilePic')->storeAs('public/assets/images/profile-pic/',$filenameToStore);
        }
        else{
            $filenameToStore = 'avtar.png';
        }
        $user = User::where('email',auth()->user()->email)->first();
        $user->name = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if($request->hasFile('profilePic')){
            Storage::delete('public/assets/images/profile-pic/'.$user->profile_pic);
            $user->profile_pic = $filenameToStore;
        }
        
        try {
            $user->save();
            return response()->json(['code' =>'1','msg'=>'Profile Updated']);
        } catch (Exception $e) {
            return response()->json(['code' =>'0','msg'=>$e]);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}

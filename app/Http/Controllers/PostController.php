<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image as Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userRegister(Request $request){

        dd($request->all());
        $check_email = User::where('email', $request->email)->first();
        if(!empty($check_email)){
            return back()->withErrors([
                'error' => 'Allready Exist',
            ]);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->mobile;
            $user->password = Hash::make($request->password);            
            $user->save();
        }

        Auth::login($user);

        return redirect()->route('dashboard');
        
    }
    ###########LOGIN##################
    public function userLogin(LoginRequest $request){
        $user = User::where('email', $request->email)->first();
        if(empty($user)){
            return back()->withErrors([
                'error' => 'Invalid username or password.',
            ]);
        }else{
            if($user->status == 0){
                return back()->withErrors([
                    'error' => 'User is blocked. Please contact the Administrator.',
                ]);
            }
        }
        $remember=false;
        if(!empty($request->remember) && $request->remember == 'on'){
            $remember=true;
        }
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password], $remember)){
            if(Auth::user()->id == '1'){
                $user = User::where('email', $request->email)->first();
                Auth::login($user);
                return redirect()->route('superdash');
            }else{
                $user = User::where('email', $request->email)->first();
                Auth::login($user);
                return redirect()->route('admindash');
            }
        }
        return back()->withErrors([
            'error' => 'Invalid username or password.',
        ]);
    }

    public function show(\App\Models\Post $post)
    {        
        // $userId = Auth::id();
        $user = DB::table("users")->where("id","=",$post->user_id)->first();
        $profile = DB::table("profiles")->where("user_id", "=", $post->user_id)->first();
        
        // return view('posts.show', compact('post'));
        if(empty($profile->image)){
            // $profile->image =public_path('storage') => storage_path('app/public/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png');
            // $profile->image = 'C:\xampp\htdocs\agpro\storage\app\public\profile\5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png';
            $profile->image = '/storage/profile/5mAfDtuQTs7npuYKvTUpIB2ahBJjPbM6BErBh8lB.png';
            $view='<img src="'. $profile->image .'">';
            print_r($view);
            // dd($profile->image);exit;
        }
        else{
            $profile->image = '/storage/'.$profile->image;
        }

        return view('posts.show',[
            'post' => $post,
            'user' => $user,
            'profile' => $profile
        ]);
    }
}

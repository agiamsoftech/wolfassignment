<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Wallet;

class HomeController extends Controller
{
    public function userRegister(Request $request){

        
        $check_email = User::where('email', $request->email)->first();
        if(!empty($check_email)){
            return back()->withErrors([
                'error' => 'Allready Exist',
            ]);
        }else{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);            
            $user->save();
        }

        Auth::login($user);
        
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
    ###########LOGIN##################
    public function userLogin(Request $request){
        
        
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
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

    public function manageUser()
    {
        if(Auth::user()->id == '1'){
            $results = User::where('id','!=',1)->select('id', 'name','email','mobile')->orderBy('id')->get();
           
            return view('manageuser',[
                'results' => $results
            ]);
        }else{
            return redirect()->route('admindash');
        }

        
    }

    public function addWallet(Request $request){   

        $addbal = new Wallet();
        $addbal->balance = $request->bal;
        $addbal->user_id = $request->user_id;            
        $addbal->save();   
    
        return redirect()->route('manageuser');       
        
    }

    
    public function clickmodal(Request $request){        
        return view('walletmodal',['user_id'=>$request->user_id]);
    }

    public function viewtrans($user){ 
        $datas = Wallet::where('user_id','=',$user)->orderBy('id')->get();       
        return view('viewtrans',['datas'=>$datas]);
    }
}

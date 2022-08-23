<?php

namespace App\Http\Controllers;

use Rules\Password;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(){
        $users=User::withCount('photos');
        if (Auth::check() && Auth::user()->is_admin==1){
            $users=$users->orderBy('created_at', 'desc');
        } else {
            $users=$users->orderBy('photos_count', 'desc');
        }
        
        $users=$users->paginate(10);
        
        return view('users', compact('users'));
    }

    public function destroy(Request $request){
       
        $id=$request->id;
        if (Auth::user()->is_admin==1){
            $users = User::find($id)->delete();
            
        
        }
        return back();

    }

    public function create(){
        
        return view('profile');
    }

    public function store(Request $request){
        $validation=$request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        if(isset($request->password)){
            $request->validate([           
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        if($validation!==false){
           
            $user=User::find(Auth::user()->id);
            $user->name= $request->name;
            $user->last_name= $request->last_name;
            $user->phone= $request->phone;
            if(isset($request->password)){
                $user->password=Hash::make($request->password);
            }
            $user->save();

            return back()->with('message', 'Succefull edit profile');
        }else{
            return back()->with('error', 'Error edit')->withErrors($validation)
            ->withInput();
        }

    }
}

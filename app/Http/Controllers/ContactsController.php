<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function create(){
        return view('contacts');
    }

    public function store(Request $request){
     
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|email',
            'message' => 'required'
            
        ]);
      
        

        if(!$validation->fails()){
        
            $message=Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'message'=>$request->message,
               
            ]);
            if (Auth::check()) {
                $user_id=Auth::user()->id;
                $message->user_id=$user_id;
                $message->save();
            }
            $adminEmail='dinevaanni@gmail.com';
            Mail::send('emails.contact_form', ['name' => $request->name], function ($message) use ($request) {

                $message->to($request->email)->subject('Изпратено съобщение до Photo Galery');
            });

            Mail::send('emails.contact_form_admin', ['name' => $request->name, 'mess'=>$request->message, 'email'=>$request->email], function ($message) use ($request) {

                $message->to('dinevaanni@gmail.com')->subject('Ново съобщение от Photo Galery');
            });
        

            return back()->with('message', 'Успешно изпратено съобщение');

        }else{
            return back()->with('status', 'Error send message')->withErrors($validation, 'contact_form')
            ->withInput();
        }
    }
}

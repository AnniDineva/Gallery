<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    public function store(Request $request){
        
        $validation=Validator::make($request->all(), [
            'user_id' => 'required',
            'comment' => 'required'
            ]);
            
        if(!$validation->fails()){
            $comment=Comment::create([
                'user_id'=>$request->user_id,
                'comment'=>$request->comment,
                'photo_id'=>$request->photo_id
            ]);

            return back()->with('message', 'Успешно изпратено съобщение');;
        } else {
            return back()->with('status', 'Error send message')->withErrors($validation, 'comments_form')
                ->withInput();
        }
    }

    public function destroy(Request $request){
        $id=$request->id;
        if (Auth::user()->is_admin==1){
            $comment = Comment::find($id)->delete();
            
            return back()->with('status', 'Успешно изтрит коментар.');
        }else{
            return back()->with('error', 'Коментари могат да се трият само от администратор!.');
        }
        

    }

    
}

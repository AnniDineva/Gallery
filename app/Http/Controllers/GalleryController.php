<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;

class GalleryController extends Controller
{
    public function index($user_id = null){
        if($user_id!== null){
            $photos=Photo::where('user_id', $user_id)
            ->paginate(10);

            

        }else{
            $photos=Photo::orderBy('created_at', 'desc');
            $photos=$photos->paginate(10);
        }

        return view('gallery', compact('photos'));
        

    }

    public function destroy(Request $request){
        $id=$request->id;
   
            $photo = Photo::find($id)->delete();
            
        return redirect('/gallery');
    }

    public function show($id){
        //$photo=Photo::find($id);
        $photo=Photo::where('photos.id', $id)
        ->leftJoin('users', 'photos.user_id', '=', 'users.id')
        ->select('photos.*', 'users.name', 'users.last_name')
        ->with(['comment'=> function ($query) {
            $query->orderBy('created_at', 'ASC');}])
        ->with('comment.user')
        ->first();
        
        //dd($photo->comment);
        
        return view('photo', compact('photo'));
    }
}

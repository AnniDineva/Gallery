<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //$photos = Photo::get();
        $photos = Photo::orderBy('created_at','desc')->limit(10)->get();
        $users=User::withCount('photos');
        $users = $users->orderBy('created_at','desc')->limit(5)->get();
        $statistikPhoto = Photo::orderBy('created_at','desc')
                        ->limit(5)
                        ->leftJoin('users', 'photos.user_id', '=', 'users.id')
                        ->select('photos.*', 'users.name', 'users.last_name')
                        ->get();
                        
        //$photos = $photos->limit(10);
        return view('home', compact('photos', 'users', 'statistikPhoto'));
    }
}

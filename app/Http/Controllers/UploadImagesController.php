<?php
namespace App\Http\Controllers;

use App\Models\Photo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UploadImagesController extends Controller
{
   public function index()
    {
        $user_id=Auth::user()->id;
        $countOfPhotos=Photo::where('user_id', $user_id)
        ->count();
        
        return view('upload_image', compact('countOfPhotos'));
    }
    public function store(Request $request)
    {
        //dd($request->file('images'));
        //echo asset('storage' . $filepath);

        $request->validate([
            'images' => 'array',
            'images.*' => 'required|file|mimes:jpg,png,jpeg,gif,svg'
        ]);
        
        if($request->hasfile('images'))
         {
            
            $user_id=Auth::user()->id;
            foreach($request->file('images') as $key => $file)
            {
                $path = $file->store('images', 'public');
                $name = $file->getClientOriginalName();
                Photo::create([
                    'title' => $name,
                    'path' => $path, 
                    'user_id' => $user_id
                ]);
            }
         }
 
        return redirect('upload_image')->with('status', 'All Images has been uploaded successfully');
    }
}
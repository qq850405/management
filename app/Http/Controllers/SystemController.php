<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
use App\Models\MainPhoto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Exception;


class SystemController extends Controller
{
    //


    public function showPoster(){

        $poster = (new Poster())->get();


        return view('poster', ['poster' => $poster]);

    }


    public function updatePoster(Request $request){
    
        try{
        $validatedData = $request->validate([
            'fileInput' => 'required|file|image|max:10240', // max:10240 -> 10MB
        ]);
    }catch(Exception $e){
        

        dd($e);
    }

     

        $file = $request->file('fileInput');
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);


        $poster = new Poster();

        $poster->create([
            'filename' => $filename
        ]);

        return redirect('/system/poster')->with('success', 'Poster updated successfully');
    }


    public function deletePoster(Request $request){
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');



        $poster = Poster::find($id);


        $poster->delete();

        return redirect('/system/MainPhoto')->with('success', 'Poster updated successfully');

    }


    public function showMainPhoto(){

        $mainPhoto = (new \App\Models\MainPhoto())->get();


        return view('main_photo', ['mainPhoto' => $mainPhoto]);

    }


    public function updateMainPhoto(Request $request){
    
        try{
        $validatedData = $request->validate([
            'fileInput' => 'required|file|image|max:10240', // max:10240 -> 10MB
        ]);
    }catch(Exception $e){
        

        dd($e);
    }

     

        $file = $request->file('fileInput');
        $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images'), $filename);


        $mainPhoto = new MainPhoto();

        $mainPhoto->create([
            'filename' => $filename
        ]);

        return redirect('/system/mainphoto')->with('success', 'Poster updated successfully');
    }


    public function deleteMainPhoto(Request $request){
        
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');



        $mainPhoto = MainPhoto::find($id);


        $mainPhoto->delete();

        return redirect('/system/mainphoto')->with('success', 'Poster updated successfully');

    }
}

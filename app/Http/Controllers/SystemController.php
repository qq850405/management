<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poster;
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

        return redirect('/system/poster')->with('success', 'Poster updated successfully');

    }
}

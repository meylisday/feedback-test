<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Http\Requests\FeedbackRequest;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use Auth;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        if($sort = $request->sort){
            $sort_by = $request->sort_by;
            $feedback  = Feedback::orderBy($sort_by, $sort)->get();
        }else{
            $sort = ' ';
            $sort_by = ' ';
            $feedback = Feedback::all();
        }
        return view('feedback', compact('feedback', 'sort_by'));
    }

//    public function sort(Request $request)
//    {
//        $sort = $request->sort;
//        $sort_by = $request->sort_by;
//        $feedback  = Feedback::orderBy($sort_by, $sort)->get();
//        return view('feedback', compact('feedback'));
//    }

    public function create(FeedbackRequest $request)
    {
        $cover = $request->file('image');
        if (!$cover){
            $extension = NULL;
            $filename = NULL;
            $mime  = NULL;
            $original_filename  = NULL;
        }else{
            $extension = $cover->getClientOriginalExtension();
            $filename = $cover->getFilename();
            $mime = $cover->getClientMimeType();
            $original_filename = $cover->getClientOriginalName();
            Storage::disk('public')->put($filename.'.'.$extension,  File::get($cover));
        }

        Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'filename' =>  (!$cover ? $filename : $filename.'.'.$extension),
            'mime' => $mime,
            'original_filename' => $original_filename
        ]);
        return redirect()->route('/')
            ->with('status','Feedback added successfully...');
    }

    public function delete($id)
    {
        if(Auth::check())
        {
            $feedback = Feedback::find($id);
            $feedback->delete($feedback->id);
        }
        return redirect('/');
    }
}

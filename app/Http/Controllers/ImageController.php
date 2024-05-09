<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function upload(Request $request)
    {

        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'image' => 'required',
            ]);

        }
        if ($validator->fails()) {
            $response = ['error' => 'Error Found'];
        }
        $data = new Post;
        $data->user_id = Auth::user()->id;
        $data->title= "hello";
        $data->description= "hello hello";
        $image = $request->file('image');
        $imagename = time() .'.'. $image->getClientOriginalExtension();
        $request->image->move('profile_img', $imagename);
        $data->image = $imagename;
        $data->save();
        return response()->json(['success'=>true]);
    }
}

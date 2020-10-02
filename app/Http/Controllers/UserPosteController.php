<?php

namespace App\Http\Controllers;

use App\Models\userPoste;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UserPosteController extends Controller
{
    // get the posts of the user

    public function posts_holder(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $newpost = new userPoste;
            $newpost->user_id = $id;
            $newpost->body = $data['add_text'];
            $newpost->status = $data['status'];
            $newpost->save();
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    public function Image_holder(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check the type of file sent
            $validation = validator::make($data, [
                'image' => 'mimes:png,jpg|required',
            ]);
            if ($validation->fails()) {
                Toastr::error('Image is not vaild , Please check it again ', 'Error');
                return back();
            } else {
                if ($request->hasFile('image')) {
                    $image_tmp = $request->file('image');
                    if ($image_tmp->isValid()) {
                        $extention = $image_tmp->clientExtension();
                        $fileName = rand(1, 10000000) . '.' . $extention;
                        $image_path = 'user-style/posts-images/' . $fileName;
                        Image::make($image_tmp)->resize(1200, 1200)->save($image_path);
                    }
                }
                if (empty($data['body'])) {
                    $data['body'] = '';
                }
                if (empty($data['video'])) {
                    $data['video'] = '';
                }
                //insert the data
                $insertImage = new userPoste;
                $insertImage->user_id = $id;
                $insertImage->body = $data['body'];
                $insertImage->image = $fileName;
                $insertImage->video = $data['video'];
                $insertImage->status = $data['status'];
                $insertImage->save();
                return redirect('/');
            }
        }
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\userPoste;
use Illuminate\Http\Request;

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
}

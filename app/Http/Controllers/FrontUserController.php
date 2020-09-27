<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    //start with the profile to show
    public function Profile($id)
    {
        $username = FrontUser::where(['id' => $id])->first();
        return view('Front-End.user-pages.profile', compact('username'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontUserController extends Controller
{

    //start with the profile to show
    public function Front_page($id)
    {
        $username = FrontUser::where(['id' => $id])->first();
        return view('Front-End.user-pages.profile', compact('username'));
    }
    public function Edit_profile(Request $request, $id)
    {
        // get the data user to update it
        $username = FrontUser::where(['id' => $id])->first();
        return view('Front-End.user-pages.edit', compact('username'));
    }
}

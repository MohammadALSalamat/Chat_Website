<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use App\Models\userPoste;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FrontIndexController extends Controller
{
    // this controller is for User interface

    public function main_page(Request $request)
    {
        // get the detailes of registerd user

        $username = FrontUser::where(['email' => Session::get('UserEmail')])->first();
        $posts_data = userPoste::with('Frontuser')->orderBy('created_at', 'DESC')->get(); // let the user see all posts in post table

        return view('layouts.front-layout.main_desgin', compact('username', 'posts_data'));
    }


    // register page
    public function Front_register(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valdiations
            $checkUserDetailes = FrontUser::where(['username' => $data['username']])->count();
            if ($checkUserDetailes === 1) {
                Toastr::error('The User name is Already Exist:)', 'Error');
                return back();
            }
            //valdiations
            $checkUserEmail = FrontUser::where(['email' => $data['email']])->count();
            if ($checkUserEmail == 1) {
                Toastr::error('The Email is Already Exist:)', 'Error');
                return back();
            }
            if (empty($data['f_name'])) {
                $data['f_name'] = "";
            }
            if (empty($data['l_name'])) {
                $data['l_name'] = "";
            }
            if (empty($data['Desc'])) {
                $data['Desc'] = "";
            }
            if (empty($data['Followers'])) {
                $data['Followers'] = 0;
            }
            if (empty($data['Followering'])) {
                $data['Followering'] = 0;
            }
            $avatar = 'profile_defult.jpg'; // defualt image for new users
            $newData = new FrontUser;
            $newData->First_name = $data['f_name'];
            $newData->Last_name = $data['l_name'];
            $newData->username = $data['username'];
            $newData->email = $data['email'];
            $newData->password = md5($data['pass']);
            $newData->Followers = $data['Followers'];
            $newData->Followering = $data['Followering'];
            $newData->description = $data['Desc'];
            $newData->avatar = $avatar;
            $newData->save();
            Toastr::success('The user has been added you can login now:)', 'Success');
            return back();
        }
        return view('Front-End.register_page');
    }

    // login function
    public function Front_login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valdiations
            $checkUserDetailes = FrontUser::where(['email' => $data['email'], 'password' => md5($data['pass'])])->count();
            if ($checkUserDetailes == 1) {
                // out the usr in session
                Session::put('UserEmail', $data['email']); // this session uses for valids authontcation
                // get all data that user will see after login.
                $username = FrontUser::where(['email' => $data['email']])->first();
                $posts_data = userPoste::orderBy('created_at', 'DESC')->get(); // let the user see all posts in post table
                foreach ($posts_data as $item) {
                    $authers = FrontUser::select('username')->where('id', $item->user_id)->get();
                    foreach ($authers as $auther) {
                    }
                }
                return view('layouts.front-layout.main_desgin', compact('posts_data', 'username', 'auther'));
            } else {
                Toastr::error('Please Check Again or Register if you are not registered yet', 'Error');
                return back();
            }
        }
        return view('Front-End.login_page');
    }

    //logout

    public function logout()
    {
        Session::flush('UserEmail');
        return redirect('/login_page');
    }
}

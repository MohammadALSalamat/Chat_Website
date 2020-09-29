<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
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

    // Edit section
    public function Store_data(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check if the user change anythig
            $checkNewChanges = FrontUser::where([
                'First_name' => $data['f_name'],
                'Last_name' => $data['l_name'],
                'username' => $data['username'],
                'description' => $data['Desc'],
                'email' => $data['email'],
            ])->count();
            if ($checkNewChanges == 1) {
                Toastr::success('There is No Changes happend to this user:)', 'Success');
                return back();
            } else {
                //valdiations
                $checkUserDetailes = FrontUser::where([
                    ['username', '=', $data['username']],
                    ['id', '!=', $id],

                ])->count();
                if ($checkUserDetailes === 1) {
                    Toastr::error('The User name is Already Exist:)', 'Error');
                    return back();
                }
                //valdiations
                $checkUserEmail = FrontUser::where([
                    ['email', '=', $data['email']],
                    ['id', '!=', $id],
                ])->count();
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
                FrontUser::where([
                    'id' => $id
                ])->update([
                    'First_name' => $data['f_name'],
                    'Last_name' => $data['l_name'],
                    'username' => $data['username'],
                    'description' => $data['Desc'],
                    'email' => $data['email']
                ]);
                Toastr::success('Congrats You have update your Profile:)', 'Success');
                return back();
            }
        }
    }
}

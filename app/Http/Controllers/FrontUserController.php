<?php

namespace App\Http\Controllers;

use App\Models\FrontUser;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
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
        } else {
            Toastr::error('Please Follow the Roules and check what you are sending', 'Error');
            return back();
        }
    }
    // update password
    public function Update_password(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valdiaction
            $checkCurrentPassword = FrontUser::where([
                'id' => $id,
                'password' => md5($data['password']),
            ])->count();
            if ($checkCurrentPassword != 1) {
                Toastr::error('Your Current Password Is Not Correct', 'Error');
                return back();
            } else {
                // check if both passwords are matched
                $newPassword = md5($data['new_pass']);
                $confirmPassword = md5($data['re_pass']);
                if ($newPassword !== $confirmPassword) {
                    Toastr::error('Both Passwords must be matched , Check again please', 'Error');
                    return back();
                } else {
                    $newPassword = md5($data['new_pass']);
                    FrontUser::where(['id' => $id])->update(['password' => $newPassword]);
                    Toastr::success('Congrats You have update your Password:)', 'Success');
                    return back();
                }
            }
        } else {
            Toastr::error('Please Follow the Roules and check what you are sending', 'Error');
            return back();
        }
    }
    public function Update_avatar(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($request->hasFile('avatar')) {
                $temp_image = $request->file('avatar');
                if ($temp_image->isValid()) {
                    $extention = $temp_image->clientExtension();
                    $fileName = rand(1, 1000000000) . '-' . $extention;
                    $avatar_path = 'user-style/user-images/' . $fileName;
                    Image::make($temp_image)->resize(250, 250)->save($avatar_path);
                } else {
                    Toastr::error('This File is Not an Image ', 'Error');
                    return back();
                }
            } else {
                $fileName = $data['current_iamge']; // defualt picture
            }
            FrontUser::where(['id' => $id])->update(['avatar' => $fileName]);
            Toastr::success('Congrats You have update your Avatar:)', 'Success');
            return back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class UserSection extends Controller
{
    //Start the User Controller

    public function view_users(Request $request)
    {
        // get data from users table

        $userData = User::where(['status' => 1])->get();
        return view('Back-End.Users.view_user', compact('userData'));
    }

    //Add users
    public function Add_users()
    {
        return view('Back-End.Users.Add_users');
    }
    public function Store_users(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //check if the email is already registerd and user name
            $check_Email = User::where(['email' => $data['email']])->count();
            $check_username = user::where(['name' => $data['username']])->count();
            if ($check_Email === 1) {
                Toastr::error('Sorry Current Email Is Registerd', 'Error');
                return back();
            }
            if ($check_username === 1) {
                Toastr::error('Sorry Current Username Is Already Exist', 'Error');
                return back();
            }
            // check the postion
            if ($data['postion'] == 0) {
                Toastr::error('Please Select one of the postions', 'Error');
                return back();
            } elseif ($data['postion'] == 1) {
                $postion = 'Admin';
            } else {
                $postion = 'Markting';
            }
            // check the avatar
            if (empty($data['avatar'])) {
                if ($request->hasFile('avatar')) {
                    $temp_image = $request->file('avatar');
                    if ($temp_image->isValid()) {
                        $extentions = $temp_image->clientExtension();
                        $fileName = rand(1, 10000000) . '.' . $extentions;
                        $avatar_path = 'admin-style/admin-images/' . $fileName;
                        Image::make($temp_image)->resize(250, 250)->save($avatar_path);
                        $request->session()->put('Image_Path', $fileName);
                    } else {
                        $fileName = $data['current_image']; // defualt picture
                    }
                } else {
                    $fileName = $data['current_image']; // defualt picture
                }
            }
            //check status
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            if (empty($data['description'])) {
                $data['description'] = null;
            }

            $create_newUser = new User;
            $create_newUser->name = $data['username'];
            $create_newUser->email = $data['email'];
            $create_newUser->Phone_Number = $data['phone'];
            $create_newUser->Description = $data['description'];
            $create_newUser->password = md5($data['password']);
            $create_newUser->postion = $postion;
            $create_newUser->status = $status;
            $create_newUser->avatar = $fileName;
            $create_newUser->save();
            // add sweet alert to show message
            Toastr::success('The User has been Added To List Users successfully :)', 'Success');
            return back();
        }
    }
    public function Edit_user(Request $request, $id)
    {
        $get_user_info = User::where(['id' => $id])->first();
        return view('Back-End.Users.Modify_user', compact('get_user_info'));
    }
    public function Modify_user(Request $request, $id)
    {
        #start modifing users
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($data['postion'] == 1) {
                $postion = 'Admin';
            } else {
                $postion = 'Markting';
            }

            //check status
            if (empty($data['status'])) {
                $status = 0;
            } else {
                $status = 1;
            }
            User::where(['id' => $id])->update([
                'postion' => $postion,
                'status' => $status
            ]);
            // add sweet alert to show message
            Toastr::success('The User has been Modified successfully !!!', 'Success');
            return back();
        }
    }

    // show the ban users
    public function banned_user(Request $request)
    {
        $banned_users = User::where('status', 0)->get();
        return view('Back-End.Users.banned_user', compact('banned_users'));
    }
    // check password and validate
    public function changPass(Request $request)
    {
        $data = $request->all();
        $value = $request->session()->get('UserId');
        $current_pass = md5($data['current_pass']);
        $AdminCheckPass = User::where(['name' => $value, 'password' => $current_pass])->count();

        if ($AdminCheckPass == 1) {
            echo 'true';
            die;
        } else {
            echo 'false';
            die;
        }
    }
    // update password after check the validation
    public function update_password(Request $request)
    {
        if ($request->isMethod('patch')) {
            $data = $request->all();
            $value = $request->session()->get('UserId');
            $current_pass = md5($data['current_pass']);
            //get the current password
            $dataChecker = User::where(['name' => $value, 'password' => $current_pass])->count();
            if ($dataChecker === 1) {
                // create new password and insert it to database
                $new_pwd = md5($data['new_pwd']);
                //update the password
                User::where(['name' => $value])->update(['password' => $new_pwd]);
                // add sweet alert to show message
                Toastr::success('password has been updated successfully :)', 'Success');
                return back();
            } else {
                Toastr::error('Sorry updating password has been falid', 'Error');
                return back();
            }
        }
    }

    //update profile
    public function update_profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            //get the avatar path to save it
            if (!empty($data['avatar'])) {
                if ($request->hasFile('avatar')) {
                    $temp_image = $request->file('avatar');
                    if ($temp_image->isValid()) {
                        $extentions = $temp_image->clientExtension();
                        $fileName = rand(1, 10000000) . '.' . $extentions;
                        $avatar_path = 'admin-style/admin-images/' . $fileName;
                        Image::make($temp_image)->resize(250, 250)->save($avatar_path);
                        $request->session()->put('Image_Path', $fileName);
                    }
                } else {
                    $fileName = $data['currnt_image'];
                }
            } else {
                $fileName = $data['currnt_image'];
            }
            // get the id to update the user
            $id = $data['id'];

            // check the email if already exist

            $check_Email = User::where(['email' => $data['email']])->count();
            if ($check_Email === 1) {
                Toastr::error('Sorry Current Email Is Registerd', 'Error');
                return back();
            }
            $check_username = user::where(['name' => $data['username']])->count();
            if ($check_username === 1) {
                Toastr::error('Sorry Current Username Is Already Exist', 'Error');
                return back();
            }
            if (empty($data['description'])) {
                $data['description'] = null;
            }
            User::where(['id' => $id])->update([
                'name' => $data['username'],
                'email' => $data['email'],
                'Phone_Number' => $data['phone'],
                'Description' => $data['description'],
                'avatar' => $fileName
            ]);
            $request->session()->flash("UserId");
            $request->session()->put('UserId', $data['username']);
            Toastr::success('Profile has been updated successfully :)', 'Success');
            return back();
        }
    }
    public function sittings(Request $request)
    {
        // use the session that stroed after login to get the user
        $value = $request->session()->get('UserId');
        $userdetalies = User::where("name",  $value)->first();
        return view('Back-End.sittings.profile', compact('userdetalies'));
    }

    // delete the user
    public function Delete_user($id)
    {
        if (empty($id)) {
            Toastr::error('The User is Not registered yet', 'Error');
            return back();
        } else {

            User::where(['id' => $id])->delete();
            Toastr::success('The User has been Deleted successfully :)', 'Success');
            return back();
        }
    }
}

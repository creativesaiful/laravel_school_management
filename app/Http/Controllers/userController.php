<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    function gerUserData(){
        $id = Auth::user()->id;
        $userData = User::find($id);

        return  view('backend.user_profile' , ['userData'=>$userData]);
    }


    public function userLogout(Request $reques){
        Auth::logout();
        return redirect('/login');
    }

    function editUserData(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('backend.user_edit', ['userData'=>$userData]);
    }


    public function updateUserData(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',

        ],[
            'name.required'=>'Please input Name',
            'phone.required'=>'Please input Phone',
            'email.required'=>'Please input Email',

        ]);



        if($request->file('profile_pic')){


            $pre_img_path = Auth::user()->profile_photo_path;

            if(!empty($pre_img_path)){
                unlink('storage/'.$pre_img_path);
            }


            $imgPath = $request->file('profile_pic');

            $imgName = 'profile-photos/'.hexdec(rand()).'.'.$imgPath->getClientOriginalExtension();

            $imgPath->move('storage/profile-photos', $imgName);

            User::where("id", Auth::user()->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,
                "profile_photo_path" => $imgName,
            ]);

        }else{
            User::where("id", Auth::user()->id)->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->phone,

            ]);
        };



        return redirect()->route('user.profile');



    }


    public function edtiUserPass(){
        return view ('backend.user_password');
    }//End Method


    public function updateUserPass(Request $request){

        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required | same:password_confirmation',
            'password_confirmation'=>'required',
        ]);



        $id = Auth::user()->id;
        $userData = User::find($id);
        $input_old = $request->old_password;

        $user_old =  $userData->password;

        if(Hash::check( $input_old,  $user_old )){
            $newPass = $request->new_password;
            $confPass = Hash::make($request->password_confirmation);

            User::where("id", Auth::user()->id)->update([
                'password'=> $confPass,
            ]);
            return redirect()-> route('user.logout');
        }


    }//End Method

    public function GetUserList(){
       $alluser =  User::latest()->get();

       return view('backend.user_list', compact('alluser'));

    }//End Method

    public function updateUserRole(Request $request){
        $id =  $request->id;
        $role = $request->role;


        User::where('id',  $id)->update(['role' =>  $role]);

        return back()->with(['type'=>'success', 'message'=>'Role updated successfully']);
    }//end Method



    public function addUserForm(Request $request){

        return view ('backend.user_add', );
    }//end Method

    public function addUser(Request $request){

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'role'=>'required',
            'password'=>'required | same:password_confirmation',
            'password_confirmation'=>'required',


        ],[
            'name.required'=>'Please input Name',
            'phone.required'=>'Please input Phone',
            'email.required'=>'Please input Email',
            'role.required' =>'Please select role',

        ]);

        User::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'password'=>Hash::make($request->password),
        ]);

        return redirect('/user/list')->with(['type'=>'success', 'message'=>'User Added successfully']);
    }//End Method


    public function deleteUser($id){

        $pre_img_path = User::find($id)->profile_photo_path;



         if(!empty($pre_img_path)){
                unlink('storage/'.$pre_img_path);
         }

        User::where('id', '=', $id)->delete();
        return back();
    }

}

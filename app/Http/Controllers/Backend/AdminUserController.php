<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdminUser\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends BackendController
{
    public function index(){
        $userData=AdminUser::orderBy('id','desc')->get();
        $this->data('usersData',$userData);
    return view($this->pagePath.'admins.show-admin-users',$this->data);
    }
    public function add(Request $request){
        if($request->isMethod('get')){
            return view($this->pagePath.'admins.add-admin-user',$this->data);
        }
        if($request->isMethod('post')){
            $this->validate($request,[
               'name'=> 'required|min:3|max:100',
               'username'=>'required|min:3|max:20|unique:admin_users,username',
               'email'=>'required|email|unique:admin_users,email',
               'password'=>'required|min:3|max:20|confirmed',
               'password_confirmation'=>'required',
                'image'=>'mimes:jpg,gif,jpeg,png'
            ]);

            $data['name']=$request->name;
            $data['username']=$request->username;
            $data['email']=$request->email;
            $data['password']=bcrypt($request->password);

            if($request->hasFile('image')){
                $file=$request->file('image');
                $ext=strtolower($file->getClientOriginalExtension());

                $imageName=md5(microtime()).'.'.$ext;
                $uploadPath=public_path('uploads/admins');

                if(!$file->move($uploadPath,$imageName)){
                    return redirect()->back()->with('error',"File not uploaded");
                }
                $data['image']=$imageName;
            }

            if(AdminUser::create($data)){
                return redirect()->route('admin-users')->with('success','Data was successfully inserted');
            }else{
                return redirect()->back()->with('error','Data was not inserted');
            }
        }
}
}

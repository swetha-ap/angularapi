<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\studentdetail;

class student extends Controller
{
    //insert data 
    function insert(Request $request){
        $name=$request->name;
        $username=$request->username;
        $password=$request->password;
        $gender=$request->gender;
        $age=$request->age;
        $phone=$request->phone;

        $s1=new studentdetail([
            'name'=>$name,
            'username'=>$username,
            'password'=>$password,
            'gender'=>$gender,
            'age'=>$age,
            'phone'=>$phone
        ]);
        $s1->save();
    }

    //get data from db to api
    function fetch(){
        $get_data=studentdetail::get();
        return response(['data'=>$get_data]);
    }

    //check username and pswd exist
    function check(Request $request){
        $username=$request->input('username');
        $password=$request->input('password');

        if(sizeof(studentdetail::where('username','like','%'.$username.'%')->where('password',$password)->get())>0){
            return response(['status_code'=>'302']);
        }else{
            return response(['status_code'=>'403']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// to connect database we import
use Illuminate\support\Facades\DB;
//to import model
use App\Models\User;

class usercontroller extends Controller
{   
    public function show($id)
    {     //echo "a";
        //
        return ("welcome");
    }

     public function parameter($user)
    {     //echo "a";
        return view('pages/users',['parameter'=>$user]);
    }
// parameter first reuest is class and 2nd i=one is variable
    function getdata(Request $request) 
    {
       //echo "FORM SUBMITTED";
        
        //validation
          $request->validate([
                    'username'=>'required | max:10', 
                     'password'=>'required | min:3'
          ]);
        return $request->input();
    }

        function session(Request $request) 
    {
       //echo "FORM SUBMITTED";
        
        //validation
          $request->validate([
                    'username'=>'required | max:10', 
                     'password'=>'required | min:3'
          ]);
// form data get name=username and then session put that dynamic in session and print session username, then profile page
               $data=$request->input('username');
          $request->session()->put('username',$data);
         // echo session('username');

          return redirect('profile_page');

        
    }

//function for flash session 
     function flashdata(Request $request) 
    {
       //echo "FORM SUBMITTED";
        
        //validation
          $request->validate([
                    'username'=>'required | max:10', 
                     'password'=>'required | min:3'
          ]);

           $data=$request->input('username');
          $request->session()->flash('username',$data);

        return redirect('flashdata');
    }

// to select data form Database 
    function index(){
        return DB::select ("select * from cars");
    }

    function addData(Request $req)
    {
       //echo "accept";

       $member=new User;
        $member->name=$req->name;
         $member->email=$req->email;
          $member->password=$req->password;

          $member->save();  
          return redirect('add');
    }
    // function route model binding
    function bind(User $id)
    {
        //for one particular data fetch 
       // return $id;
        return $id->all();
    }
}

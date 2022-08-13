<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// to Add validation we import
use Validator;

class ApiController extends Controller
{
    function getdata()
    {
        //without db API code
        return ['name'=>"Ali","address"=>"Raiwind"];
    }
     function getdb()
    {
        //with Model db API code, for this purpose we import User model and then return All user data

        return User::all();
    }

    // API Function with parameter
    function getpara($id)
    {
        //  return User::all();
       // find particular id data
        return User::find($id);
    }
      // API Function where id make an optional mostly we use this function.
    function getpIdOptional($id=null)
    {
      return $id?User::find($id):User::all();
    }
    //function for POST API
    function add(Request $req)
    {
          //return ["result"=>"done"];
        $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
         $user->password=$req->password;
        $result=$user->save();
        if($result)
        {
            return ["result"=>"done"];
        }
        else
         {
            return ["result"=>"failed"];
        }
    }

// function for put method
        function update(Request $req)
    {
        $user= User::find($req->id);
        //return "done";

        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=$req->password;
        $result=$user->save();
        if($result)
        {
            return ["result"=>"updated"];
        }
        else
        {
            return ["result"=>"failed to update"];
        }
    }

    // function for put method
        function delete($id)
    {
        $user= User::find($id);
        $result=$user->delete();
        if($result)
        {
            return ["result"=>"deleted successfully"];
        }
        else
        {
            return ["result"=>"fail to delete"];
        }
    }

function search($name)
    {
        //to search full name we use
       // return User::where("name",$name)->get();

        //to search specific word we add
        // if the user exits show result otherwise show not found
        If(User::where("name","like","%".$name."%")->exists())
        {
           //return User::where("name",$name)->get();
            return User::where("name","like","%".$name."%")->get();
        }
        else
        {
            return "Invalid Search";
        }
    }

function validatef(Request $req)
{
    $rules=array("email"=>"required",
                  "password"=>"required | min:3"
    );


    $validator= Validator::make($req->all(), $rules);
    if ($validator->fails())
    {
        //below line create an error but in postman statusn show 200 ok
       //return $validator->errors();
        //if we want change status we use response ()
        return response()->json($validator->errors(),401);
    } else
    {
       $user= new User;
        $user->name=$req->name;
        $user->email=$req->email;
         $user->password=$req->password;
        $result=$user->save();
        if($result)
        {
            return ["result"=>"user data saved in db"];
        }
        else
         {
            return ["result"=>"failed to save"];
        }
    }

}
function fileupload(Request $req)
{     // file save
    //return $req->file('file')->store('apiDocs');
      // want to show json format
    $result=$req->file('file')->store('apiDocs');
    return ["result"=>"$result"];
}


public function register(Request $request)

{

    $validator = Validator::make($request->all(), [

        'name' => 'required',

        'email' => 'required|email',

        'password' => 'required',

    ]);
// dd($validator);


    if($validator->fails()){

        return $this->sendError('Validation Error.', $validator->errors());

    }



    $input = $request->all();

    $input['password'] = bcrypt($input['password']);

    $user = User::create($input);

    $success['token'] =  $user->createToken('MyApp')->accessToken;

    $success['name'] =  $user->name;



}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class querycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        * method get
        *return ["name"=>"KAshif"];
        */
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //method post
       // return ["name"=>"KAshif"];
        $user= new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $result=$user->save();
        if($result)
        {
            return "User added successfully";
        } else
        {
            return "user failed to add";
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //method get with parameter
        return User::find($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $user= User::find($request->id);
        //return "done";
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

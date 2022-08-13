<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\User;

class membercontroller extends Controller
{
    function listfunction()
    {
           $data=User::all();

          return view('pages.list',['users'=>$data]);
    }
    function delete($id)
    {
         // echo "delete";
        $data=User::find($id);
        $data->delete();
        return redirect('list');
    }

    function showdata($id)
    {
         $data=User::Find($id);
        return view('pages.edit',['data'=>$data]);

    }
      function update(Request $req)
    {
        //return User::find($req);
       $data=User::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=$req->password;
      //  echo"save";
        $data->save();
        return redirect('list');
    }

    function operation()
    {
        //echo "code will be here";
        //return a function DB table Table_name and next get method and use where class
       /*return DB::table('users')
        ->where('id',14)->get(); */
// find query
        // return DB::table('users')->find(13);

// count query
       // return DB::table('users')->count();

  // to INSERT 
      /*  return DB::table('users')
        ->INSERT([
                   'name'=>'kashif Ali',
                   'email'=>'kashifshahid12@gmail.com',
                   'password'=>'123'
        ]);*/
 /*to UPDATE
        return DB::table('users')->where('id', 14)->UPDATE([
                   'name'=>'ASIM SHAHID',
                   'email'=>'kashifsh@gmail.com',
                   'password'=>'123'
        ]); */

//to delete
         return DB::table('users')->where('id', 17)->delete();

       // $data=DB::table('users')->get();
       // return view('pages.listquery',['data'=>$data]);
    }

      function operationaggregate()
      {
        //to sum aggregate
       //return DB::table('users')->sum('id');
       // return DB::table('users')->min('id');
       //return DB::table('users')->max('id');
        return DB::table('users')->avg('id');
      }
      function upload(Request $req)
      {
        return $req->file('file')->store('img');
      }
}

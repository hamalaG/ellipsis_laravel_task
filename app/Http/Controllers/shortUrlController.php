<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Config\Auth;
Use App\Models\shortUrl;
use App\RegisteredUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class shortUrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
//storing data in the database
    public function store(Request $request)
    {
        $original_url = $request->input('original_url');
        $short_url = 'http://localhost/'.str::random(6);
        $id = auth()->user()->id; //getting the authenticated user
         
        $data= [
            'user_id'=>$id,
            'original_url'=>$original_url,
            'short_url'=>$short_url,
            'created_at'=>carbon::now(),
            'updated_at'=>Carbon::now()        
        ];
        
        DB::table('short_urls')->insert($data);
        return view("success",compact('short_url','original_url'));        
    }

//Display a list of things
    public function index()
    {
        
        $users = shortUrl::where('user_id','=',auth()->user()->id)->get();
        return view('manage',compact('users'));

        //alternatives
        //$users= DB::table('short_urls')->where('user_id','=',auth()->user()->id)->get();
        //return view('manage',compact('users'));

        // $id = auth()->user()->id;
        // $user = DB::select('select * from short_urls where user_id=?', [$id]);
        // return view('manage',['users'=>$user]);
    }

    public function delete(shortUrl $id) {
        $id->delete();
        return redirect('/manage_account ')->with('message', 'Deleted successfully');
        }


//Show the form for editing the specified resource.
    public function edit($id) {
        $user = shortUrl::findOrFail($id);
        return view('editpage', compact('user'));
     }


//Editing/updating the database
     public function update(Request $request,$id) {
        // $short = $request->input('short_url');
        // $long = $request->input('original_url');
        // DB::update('update short_urls set short_url = ?, original_url = ? where id = ?',[$short,$long ,$id]);
        // echo "Record updated successfully.<br/>";
        // echo '<a href = "/manage_account">Click Here</a> to go back.';

        $validatedData = $request->validate([
            'short_url' => 'required',
            'original_url' => 'required'
        ]);
        shortUrl::whereId($id)->update($validatedData);

        return redirect('/manage_account ')->with('message', 'URL Data is successfully updated');
     }


//showing a row in a database
     public function view($id)
    {
        $user = DB::select('select users.*, short_urls.* from users
        join short_urls
        on users.id=short_urls.user_id
        where short_urls.id=?', [$id]);
        return view('urlindex', ['users' => $user]);
    }

}

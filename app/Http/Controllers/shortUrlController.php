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
    
    public function insert(Request $request)
    {
        $original_url = $request->input('original_url');
        $short_url = 'http://localhost/'.str::random(6);
        $id = auth()->user()->id;
         
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

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        $user = DB::select('select * from short_urls where user_id=?', [$id]);

        return view('manage',['users'=>$user]);
    }

    public function delete(shortUrl $id) {
        $id->delete();
        return redirect()->back()->with('message', 'Deleted successfully');
        }

         /**
     * Show the form for editing the specified resource.
     */
    public function show($id) {
        $user = DB::select('select * from short_urls where id = ?',[$id]);
        return view('updatepage',['users'=>$user]);
     }
  /**
     * Editing/updating the database
     */
     public function edit(Request $request,$id) {
        $short = $request->input('short_url');
        $long = $request->input('original_url');
        DB::update('update short_urls set short_url = ?, original_url = ? where id = ?',[$short,$long ,$id]);
        echo "Record updated successfully.<br/>";
        echo '<a href = "/manage_account">Click Here</a> to go back.';
     }
/**
     * showing a row in a database
     */
     public function view($id)
    {
        $user = DB::select('select users.*, short_urls.* from users
        join short_urls
        on users.id=short_urls.user_id
        where short_urls.id=?', [$id]);
        return view('viewurl', ['users' => $user]);
    }

}

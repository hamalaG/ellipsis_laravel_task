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
        $new_url = $request->input('original_url');
        $short_url = 'http://localhost/'.str::random(6);
        $id = DB::table('users')->value('id');
         
        $data= [
            'user_id'=>$id,
            'original_url'=>$new_url,
            'short_url'=>$short_url,
            'created_at'=>carbon::now(),
            'updated_at'=>Carbon::now()        
        ];
        
        DB::table('short_urls')->insert($data);
        return view("success",compact('short_url', 'new_url' ));        }


    public function index(Request $request)
    {
        $id = DB::table('users')->value('id');
        $user = DB::select('select * from short_urls where user_id=?', [$id]);

        return view('manage',['users'=>$user]);
    }

    public function delete($id) {
        $id = DB::table('users')->value('id');
        DB::delete('delete from short_urls where id = ?',[$id]);
        echo "Record deleted successfully.";
        echo 'Click Here to go back.';
        }

        public function edit($id) {
            $id = DB::table('users')->value('id');
            DB::delete('delete from short_urls where id = ?',[$id]);
            echo "Record deleted successfully.
            ";
            echo 'Click Here to go back.';
            }

}

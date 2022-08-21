<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Config\Auth;
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
        return $short_url;
        }


    public function index(Request $request)
    {
        // dd($request);

    }

    public function manage_acc(Request $request)
    {
        dd($request);
    }

}

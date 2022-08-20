<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Config\Auth;
use App\RegisteredUsers;
use Illuminate\Support\Facades\DB;



class shortUrlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert(Request $request)
    {
        $new_url = $request->input('original_url');
        $short_url = base_convert($new_url,10,36); 
        $id = DB::table('users')->value('id');
         
        $data= [
            'user_id'=>'1',
            'original_url'=>$new_url,
            'short_url'=>$short_url,
            'created_at'=>carbon::now(),
            'updated_at'=>Carbon::now()        
        ];
        
        DB::table('short_urls')->insert($data);
        return $short_url;
        }


    public function show(Request $request)
    {
    }

}

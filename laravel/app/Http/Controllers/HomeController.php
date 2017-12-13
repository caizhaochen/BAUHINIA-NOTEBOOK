<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
//        return view('home')->withArticles(\App\Article::all());
        return view('home')->with('id_log',$user);
    }

    public function myself(){
        $userme = Auth::user();
        $id=$userme->id;
        $user=DB::table('users')->select('id','name','email')->where('id',$id)->first();
//        dd($user);
        return view('myself',['user'=>$user]);
    }

    public function modifyInfo(Request $request){
        $data=$request->all();
        $username=$data['username'];
        $userme = Auth::user();
        $id=$userme->id;
        $modify=DB::table('users')->where('id',$id)->update(['name'=>$username]);
        return redirect('myself');
    }
}

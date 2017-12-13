<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    //个人查看自己的信息
    public function myself(){
        $user=Auth::user();
        $id=$user->id;
        $users=DB::table('users')->select('id','name','email')->where('id',$id)->first();
        return view('myself',['user'=>$users]);
    }

    //个人修改自己的信息
    public function modifyInfo(Request $request){
        $data=$request->all();
        $user=Auth::user();
        $id=$user->id;
        $name=$data['username'];
        $pass=$user->password;
        $now=DB::table('users')->where('id',$id)->first();
        $modify=DB::table('users')->where('id',$id)->update(['name'=>$name]);
        return redirect('myself');
    }

    public function modifyPass(){
        $origin=$_POST['origin'];
//        $origin=trim($origin);
        $new=$_POST['new'];
        $confirm=$_POST['confirm'];
        $user=Auth::user();
        $id=$user->id;
        $now=DB::table('users')->where('id',$id)->first();
        if(Hash::check($origin,$now->password)){
            if($new===$confirm){
                $newHash=bcrypt($new);
                $modify=DB::table('users')->where('id',$id)->update(['password'=>$newHash]);
                return "success";
            }
            else{
                return "newerror";
            }
        }
        else{
            return "originerror";
        }

    }

    //一下都是管理员的方法
    //加载所有除了管理员的账号
    public function initial()
    {
        $user=DB::table('users')->where('id','<>',7)->paginate(3);
//        dd($user);
        return view('admin/adminShow',['users'=>$user]);
    }

    //修改某个账号
    public function modify($id){
        $user=User::find($id);
        return view('admin.adminModify',['user'=>$user]);
    }

    //删除某个账号
    public function delete($id){
        $delete=DB::table('users')->where('id',$id)->delete();
        $delete1=DB::table('friends')->where('to_user',$id)->delete();
        $delete2=DB::table('share')->where('share_from',$id)->delete();
        return redirect('admin/initial');
    }

    //保存修改
    public function save(Request $request){
        $data=$request->all();
        $id=$data['userid'];
        $name=$data['username'];
        $save=DB::table('users')->where('id',$id)->update(['name'=>$name]);
        return redirect('admin/initial');
    }

    public function search(){
        return view('admin.search');
    }
    public function searchuser(Request $request){
        $data=$request->all();
        $name=$data['name'];
        $search='%'.$name.'%';
        $idlike=DB::table('users')->where('id','like',$search);
        $namelike=DB::table('users')->where('name','like',$search);
        $result=DB::table('users')->where('email','like',$search)->union($idlike)->union($namelike)->get();
        return view('admin.searchAdminRes',['users'=>$result]);
    }


}

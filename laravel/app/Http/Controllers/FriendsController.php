<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FriendsController extends Controller
{
    public function friends(){
        $user=Auth::user();
        $id=$user->id;
        $friends=DB::table('friends')
            ->leftJoin('users','users.id','=','friends.to_user')
            ->where('from_user',$id)->get();

        return view('friends.addfriends',['friends'=>$friends]);
    }

    public function search(){
        return view('friends.searchFriends');
    }
    public function searchName(Request $request){
        $self=Auth::user();
        $selfid=$self->id;
        $name=$request->all();
        $sename=$name['username'];
        $name='%'.$sename.'%';
        $searchname=DB::select
                                ('select id,`name`,email from users where `name` like ? and id <> ? and id<>7 and id not in 
                                      (select to_user from friends where from_user = ? )
                                UNION 
                                select id,`name`,email from users where `email` like ? and id <> ? and id<>7 and id not in 
                                      (select to_user from friends where from_user = ?)',
                                [$name,$selfid,$selfid,$name,$selfid,$selfid]);
        return view('friends.searchFriRes',['users'=>$searchname,'content'=>$sename]);
    }

    public function follow($id){
        $self=Auth::user();
        $selfid=$self->id;
        $follow=DB::insert('insert into friends (from_user , to_user) VALUES (?,?)',[$selfid,$id]);
        return redirect('friends/add');
    }

    //展示好友信息
    public function getFriends(){
        $id=$_POST['id'];
        $friends=DB::table('users')->select('name','email')->where('id',$id)->get();
        return $friends;
    }

    //添加协作
    public function cooperate(){
        $self=Auth::user();
        $selfid=$self->id;
        $to_user=$_POST['to_user'];
        $note_id=$_POST['note'];
        $auth=$_POST['auth'];
        $same=DB::select('select * from share where share_from=? and share_to=? and share_note=?',[$selfid,$to_user,$note_id]);
        if($same==null){
            $cooperate=DB::insert('insert into share (share_from,share_to,share_note,share_auth) VALUES (?,?,?,?)',[$selfid,$to_user,$note_id,$auth]);
            return (string)$cooperate;
        }
        else{
            $cooperate=DB::update('update share set share_auth=? where share_from=? and share_to=? and share_note=?',[$auth,$selfid,$to_user,$note_id]);
            return (string)$cooperate;
        }
    }

    //获得协作与分享
    public function getShare(){
        $self=Auth::user();
        $selfid=$self->id;
        $cooperate=DB::select('select share_from,`name`,email,share_note,title,tag from share,users,notes 
                              where share.share_to=? AND share.share_from=users.id AND share.share_note=notes.note_id AND share_auth=\'w\'',[$selfid]);
        $share=DB::select('select share_from,`name`,email,share_note,title,tag from share,users,notes 
                              where share.share_to=? AND share.share_from=users.id AND share.share_note=notes.note_id AND share_auth=\'r\'',[$selfid]);
        return view('friends.getShare',['cooperates'=>$cooperate,'shares'=>$share]);

    }
    public function presentation($id){
        $note=DB::table('notes')->where('note_id',$id)->first();
        $user=Auth::user();
        $id=$user->id;
        $friends=DB::table('friends')
            ->leftJoin('users','users.id','=','friends.to_user')
            ->where('from_user',$id)->get();
        return view('friends.showShareNote',['note'=>$note,'friends'=>$friends]);
    }

    public function delete($id){
        $user=Auth::user();
        $selfid=$user->id;
        $delete=DB::table('friends')->where('from_user',$selfid)->where('to_user',$id)->delete();
        return redirect('friends/add');
    }
}

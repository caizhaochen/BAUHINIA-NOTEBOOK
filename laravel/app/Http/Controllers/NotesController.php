<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use PDF;
use SnappyImage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $id=$_POST['id'];
        $note=DB::table('notes')->where('note_id',$id)->get();
        return $note;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $note_id=$_POST['note_id'];
        $new_title=$_POST['title'];
        $new_tag=$_POST['tag'];
        $note=DB::table('notes')->where('note_id',$note_id)->update(['title'=>$new_title,'tag'=>$new_tag]);
//        $note=DB::table('notes')->where('note_id',$note_id)->get();
        return $note;
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

    public function createNote(Request $request){
        $datainput=$request->all();
//        $data=implode(',',$datainput);
        $notebook=$datainput['notebook_id'];
        $title=$datainput['title'];
        $tag=$datainput['tag'];
        $notesame=DB::table('notes')->where('notebook_id',$notebook)->where('title',$title)->get();
        if($notesame->count()>0){
//            Session::flash('error',"该笔记本下已有同名笔记");
            return redirect('notebooks/create');
        }
        else{
            $bool=DB::insert("insert into notes(notebook_id,title,tag,body) VALUES (?,?,?,?)",[$notebook,$title,$tag,""]);
//        $note=DB::select('select * from notes where notebook_id=? and title=? and tag=? and body=?',[$notebook,$title,$tag,""]);
            $note=DB::table('notes')->where('notebook_id',$notebook)->where('title',$title)->where('tag',$tag)->first();
            $noteid=$note->note_id;
            return redirect('notebooks/create');
//            return redirect(url('notes/presentation',$noteid));
        }

    }

    //用来保存内容的更新
    public function save()
    {
        $id=$_POST["id"];
        $body=$_POST["body"];
        $num=DB::table('notes')
            ->where('note_id',$id)
            ->update(['body'=>$body]);
        return $num;
    }

    public function download(){
        $id=$_POST["id"];
        $body=$_POST["body"];

        $pdf = PDF::loadHtml($body);
        return $pdf->download('invoice1.pdf');
    }

    //用以展示某篇具体的日记
    public function presentation($id){
        $note=DB::table('notes')->where('note_id',$id)->first();
        $user=Auth::user();
        $id=$user->id;
        $friends=DB::table('friends')
            ->leftJoin('users','users.id','=','friends.to_user')
            ->where('from_user',$id)->get();
        return view('notes.shownote',['note'=>$note,'friends'=>$friends]);
    }

    //修改笔记本、笔记界面返回展示界面
    public function backtoshow(){
//        return redirect('notebooks/show');
        return redirect()->back();
    }

    public function delete($id)
    {

        $note=DB::table('notes')->where('note_id',$id)->delete();
        return redirect('notebooks/show');
    }

    public function search(Request $request){
        $request=$request->all();
        $content=$request['name'];
        $name='%'.$content.'%';
        $book=DB::table('notebooks')->leftJoin('notes','notes.notebook_id','=','notebooks.notebook_id')->where('name','like',$name)->get();
        $note=DB::table('notes')->leftJoin('notebooks','notes.notebook_id','=','notebooks.notebook_id')->where('title','like',$name)->get();
        $tag=DB::table('notes')->leftJoin('notebooks','notes.notebook_id','=','notebooks.notebook_id')->where('tag','like',$name)->get();
        return view('notes.searchRes',['content'=>$content,'notebooks'=>$book,'notes'=>$note,'tags'=>$tag]);
//        return $content;
    }
}

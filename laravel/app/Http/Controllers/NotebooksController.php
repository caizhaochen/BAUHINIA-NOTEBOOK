<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notebooks;
use App\Note;
use Illuminate\Support\Facades\DB;
use function MongoDB\BSON\toJSON;

class NotebooksController extends Controller
{
    public function index(){

      $user = Auth::user();
      return view('home')->with('id_log',$user->name);
    }

    //这个方法是初始化页面的
    public function create(){

        $user = Auth::user();
        $user_id=$user->id;
        $email=$user->email;
        if($email=="admin@qq.com"&&$user_id==7){
            return redirect('admin/initial');
        }
        else{
            $notebooks = $user->notebooks()->get();
            $notes=DB::table('notes')
                ->join('notebooks','notes.notebook_id','=','notebooks.notebook_id')
                ->where('notebooks.user_id','=',$user_id)->get();
            return view('notebooks.create')->with('notebooks',$notebooks)->with('notes',$notes);
        }
    }

    public function show()
    {
        $user = Auth::user();
        $id=$user->id;
        $notes=DB::table('notes')->leftJoin('notebooks','notes.notebook_id','=','notebooks.notebook_id')->where('notebooks.user_id','=',$id)->paginate(6);
        return view('notebooks.show',['notes'=>$notes]);
    }


    public function store(Request $request)
    {
      $dataInput = $request->all();
      $user = Auth::user();
      $user->notebooks()->create($dataInput);
      return redirect('notebooks/create');

    }


    public function edit($id)
    {
        $info=DB::table('notes')->leftJoin('notebooks','notes.notebook_id','=','notebooks.notebook_id')->where('note_id',$id)->first();
        return view('notebooks.edit',['info'=>$info]);
    }


    public function update()
    {
        $notebook_id=$_POST['book_id'];
        $name=$_POST['name'];

        $notebook = DB::table('notebooks')->where('notebook_id',$notebook_id)->update(['name'=>$name]);
//        $notebook = DB::table('notebooks')->where('notebook_id',$notebook_id)->get();
        return $notebook;

    }


    public function delete($id)
    {

        $note=DB::table('notes')->where('notebook_id',$id)->delete();
        $notebook=DB::table('notebooks')->where('notebook_id',$id)->delete();
        return redirect('notebooks/show');
    }

    public function searchBook(){
        $name=$_POST['name'];
        $name='%'.$name.'%';
        $book=DB::table('notebooks')->where('name','like',$name)->get();
        return $book;
    }
    public function search(){
        return view('notes.search');
    }
}

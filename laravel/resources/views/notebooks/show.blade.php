@extends('layouts.homeapp')
@section('home_content')

<div>

    <table class="table table-hover table-bordered " style="background-color: white ;text-align: center">
        <thead>
        <tr>
            <td scope="row">笔记本</td>
            <td>笔记标题</td>
            <td>笔记标签</td>
            <td>操作</td>
        </tr>
        </thead>
        @forelse($notes as $note)
            <tr>
                <th scope="row" class="nametd">{{$note->name}}</th>
                <td class="titletd">{{$note->title}}</td>
                <td class="tagtd">{{$note->tag}}</td>
                <td style="display: none" class="booktd">{{$note->notebook_id}}</td>
                <td style="display: none" class="notetd">{{$note->note_id}}</td>

                <td>
                    <a href="{{url('notes/presentation',$note->note_id)}}" class="btn btn-success btn-sm">
                        <i class="fa fa-fw fa-file"></i>
                        查看
                    </a>
                    <a href="{{url('notebooks/edit',$note->note_id)}}" class="btn btn-warning btn-sm">
                    {{--<a href="#" class="btn btn-warning btn-sm modifybook" name="{{$note->name}}">--}}
                        <i class="fa fa-fw fa-pencil"></i>
                        修改
                    </a>
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>删除</button>
                        <button type="button" class="btn btn-danger dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">

                            <li>
                                <a href="{{url('notebooks/delete',$note->notebook_id)}}" >
                                    删除该笔记本
                                </a>
                            </li>
                            <li>
                                <a href="{{url('notes/delete',$note->note_id)}}" >
                                    删除该笔记
                                </a>
                            </li>

                        </ul>
                    </div>
                    {{--<a href="" class="btn btn-danger btn-sm">--}}
                        {{--<i class="fa fa-fw fa-trash"></i>删除</a>--}}
                </td>
            </tr>
        @empty
            <div>
                <header class="jumbotron hero-spacer ">
                    <h2>你还没有记过任何笔记</h2>
                    <p><a href="{{ URL('notebooks/create') }}" class="btn btn-primary btn-large"><i class="fa fa-fw fa-mouse-pointer"></i>去新建</a>
                    </p>
                </header>
            </div>
        @endforelse
    </table>
</div>
<div class="pagination" style="float: right">
    {{$notes->render()}}
</div>



@endsection



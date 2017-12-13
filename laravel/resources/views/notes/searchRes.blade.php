@extends('layouts.homeapp')
@section('home_content')


    <div>
        <form action="{{url('search')}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-11">
                    <input type="text" class="form-control " placeholder="笔记本/笔记/标签"
                            name="name" value="{{$content}}" style="height: 40px">
                </div>
                <div class="col-xs-1">
                    <input type="submit" class=" btn btn-success" value="search" style="height: 40px">
                </div>
            </div>
        </form>

        <div class="row">
            <div><br></div>
        </div>
        <a class="btn btn-primary btn-lg" role="button" data-toggle="collapse" href="#collapseBook" aria-expanded="false"
           aria-controls="collapseBook">
            笔记本 <i class="fa fa-fw fa-angle-down"></i>
        </a>
        <div class="collapse" id="collapseBook">
            @forelse($notebooks as $notebook)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">{{$notebook->name}}</h3>
                            </div>
                            <div class="col-xs-8"></div>
                            <div class="col-xs-1">
                                <a href="{{url('notes/presentation',$notebook->note_id)}}" class="btn btn-success">查看笔记</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>笔记标题：{{$notebook->title}}</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>笔记标签：{{$notebook->tag}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">没有相关笔记本</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>

        <div class="row">
            <div><br></div>
        </div>
        <a class="btn btn-primary btn-lg" role="button" data-toggle="collapse" href="#collapseNote"
           aria-expanded="false" aria-controls="collapseNote">
            笔记 <i class="fa fa-fw fa-angle-down"></i>
        </a>
        <div class="collapse" id="collapseNote">
            @forelse($notes as $note)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">{{$note->name}}</h3>
                            </div>
                            <div class="col-xs-8"></div>
                            <div class="col-xs-1">
                                <a href="{{url('notes/presentation',$note->note_id)}}"class="btn btn-success">查看笔记</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>笔记标题：{{$note->title}}</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>笔记标签：{{$note->tag}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">没有相关笔记</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <div class="row">
            <div><br></div>
        </div>
        <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseTag"
           aria-expanded="false" aria-controls="collapseTag">
            标签 <i class="fa fa-fw fa-angle-down"></i>
        </a>
        <div class="collapse" id="collapseTag">
            @forelse($tags as $tag)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">{{$tag->name}}</h3>
                            </div>
                            <div class="col-xs-8"></div>
                            <div class="col-xs-1">
                                <a href="{{url('notes/presentation',$tag->note_id)}}" class="btn btn-success">查看笔记</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <h4>笔记标题：{{$tag->title}}</h4>
                            </div>
                            <div class="col-xs-3">
                                <h4>笔记标签：{{$tag->tag}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-2">
                                <h3 class="panel-title">没有相关标签</h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

@endsection
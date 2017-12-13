@extends('layouts.homeapp')
@section('home_content')


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
    <div class="container">
        <header class="jumbotron hero-spacer ">
            <h1>你还没有收到好友的分享笔记哦~~</h1>
        </header>
    </div>
@endforelse


@endsection
@extends('layouts.homeapp')
@section('home_content')



<a class="btn btn-success btn-lg" role="button" data-toggle="collapse" href="#collapseCooperate" aria-expanded="false"
   aria-controls="collapseCooperate">
    收到的协作 <i class="fa fa-fw fa-angle-down"></i>
</a>
<div class="collapse" id="collapseCooperate">
    @forelse($cooperates as $cooperate)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <h3 class="panel-title">{{$cooperate->title}}</h3>
                    </div>
                    <div class="col-xs-8"></div>
                    <div class="col-xs-1">
                        <a href="{{url('notes/presentation',$cooperate->share_note)}}" class="btn btn-success">去协作</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">
                        <h4>分享者:{{$cooperate->name}}({{$cooperate->email}})</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <h4>笔记标题：{{$cooperate->title}}</h4>
                    </div>
                    <div class="col-xs-3">
                        <h4>笔记标签:{{$cooperate->tag}}</h4>
                    </div>
                    <div class="col-xs-3">
                        <h4>权限：可写</h4>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <h3 class="panel-title">你还没收到任何协作笔记哦~~~~</h3>
                    </div>
                </div>
            </div>
        </div>
    @endforelse

</div>

<div class="row">
    <div><br></div>
</div>

<a class="btn btn-success btn-lg" role="button" data-toggle="collapse" href="#collapseShare" aria-expanded="false"
   aria-controls="collapseShare">
    收到的分享 <i class="fa fa-fw fa-angle-down"></i>
</a>
<div class="collapse" id="collapseShare">
    @forelse($shares as $share)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <h3 class="panel-title">{{$share->title}}</h3>
                    </div>
                    <div class="col-xs-8"></div>
                    <div class="col-xs-1">
                        <a href="{{url('friends/presentation',$share->share_note)}}" class="btn btn-success">查看分享</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-3">
                        <h4>分享者:{{$share->name}}({{$share->email}})</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3">
                        <h4>笔记标题：{{$share->title}}</h4>
                    </div>
                    <div class="col-xs-3">
                        <h4>笔记标签:{{$share->tag}}</h4>
                    </div>
                    <div class="col-xs-3">
                        <h4>权限:只读</h4>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-2">
                        <h3 class="panel-title">你还没收到任何分享哦~~~~</h3>
                    </div>
                </div>
            </div>
        </div>
    @endforelse

</div>

<div class="row">
    <div><br></div>
</div>

@endsection
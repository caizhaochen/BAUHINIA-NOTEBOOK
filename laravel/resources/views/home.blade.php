{{--@extends('layouts.homeapp')--}}

{{--@section('home_content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Dashboard</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--You are logged in!--}}
                        {{--{{$id_log}}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@endsection--}}

@extends('layouts.app')

@section('content')
    <!-- Jumbotron Header -->
    <div class="container">
        <header class="front jumbotron hero-spacer ">
            <h2>BAUHINIA Notebook!</h2>
            {{--<p>Bauhinia Notebook——一款为自己和女友写的在线笔记</p>--}}
            <p>记下生活中的点点滴滴</p>
            <p><a href="{{ URL('notebooks/create') }}" class="btn btn-primary btn-large">Goto notes!</a>
            </p>
        </header>
    </div>


@endsection

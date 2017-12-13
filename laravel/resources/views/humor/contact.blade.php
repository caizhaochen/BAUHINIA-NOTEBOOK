@extends('layouts.homeapp')

@section('home_content')
    <!-- Jumbotron Header -->
    <div class="container">
        <header class="jumbotron hero-spacer ">
            <h2>你为什么要联系我，是不是喜欢我？</h2>
            {{--<p>Bauhinia Notebook——一款为自己和女友写的在线笔记</p>--}}
            <p>——————————犯贱的作者</p>
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-1">
                    <a href="{{ URL('notebooks/create') }}" class="btn btn-danger ">
                        <i class="fa fa-fw fa-close"></i>
                        不喜欢
                    </a>
                </div>
                <div class="col-xs-1"></div>
                <div class="col-xs-1">
                    <a href="{{ URL('love') }}" class="btn btn-info ">
                        <i class="fa fa-fw fa-heart"></i>
                        喜欢
                    </a>
                </div>
            </div>

        </header>
    </div>


@endsection
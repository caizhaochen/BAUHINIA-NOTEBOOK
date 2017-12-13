@extends('layouts.homeapp')
@section('home_content')


<div class="container">
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>
    <div class="row"><br></div>

    <form action="{{url('search')}}" method="post">
        {{csrf_field()}}
                <div class="row">
                    <div class="col-xs-10">
                        <input type="text" class="form-control" placeholder="笔记本/笔记/标签" name="name" style="height: 50px">
                    </div>
                    <div class="col-xs-1">
                        <input type="submit" class=" btn  btn-success" value= "search" style="height: 50px">
                    </div>
            </div>
    </form>

</div>

@endsection
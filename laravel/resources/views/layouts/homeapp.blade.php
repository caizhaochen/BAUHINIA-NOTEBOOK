@extends('layouts.app')

@section('content')
    <div class="row" id="side_row">
        <div class="col-xs-1">
            <!-- Sidebar -->
            <nav class="navbar navbar-inverse " id="sidebar-wrapper1" role="navigation">
                <ul class="nav sidebar-nav">

                    <li>    </li>
                    <li>
                        <a href="{{url('myself')}}"><i class="fa fa-fw fa-user-circle-o"></i> MySelf</a>
                    </li>
                    <li>
                        <a href="{{url('notebooks/show')}}"><i class="fa fa-fw fa-home"></i>  Home</a>
                    </li>
                    <li>
                        <a href="{{url('notebooks/create')}}"><i class="fa fa-fw fa-file-o"></i> Notes</a>
                    </li>
                    <li>
                        <a href="{{url('notebooks/search')}}"><i class="fa fa-fw fa-search"></i> Search</a>
                    </li>
                    <li>
                        <a href="{{url('friends/getShare')}}"><i class="fa fa-fw fa-share-square-o"></i> Shared</a>
                    </li>
                    <li>
                        <a href="{{url('friends/add')}}"><i class="fa fa-fw fa-wechat"></i> Friends</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}"><i class="fa fa-fw fa-whatsapp"></i> Contact</a>
                    </li>
                    <li>
                        <button type="button" id="shotcut"><i class="fa fa-fw fa-camera"></i> Shotcut</button>
                    </li>

                </ul>
            </nav>
            <!-- /#sidebar-wrapper -->
        </div>
        {{--<div class="col-xs-1"></div>--}}
            <!-- Page Content -->
        <div class="col-xs-10">
            <div id="page-content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class=" col-xs-11">
                            @yield('home_content')
                            {{--<h1 class="page-header">Awesome Bootstrap 3 Sidebar Navigation</h1>--}}
                            {{--<p>Donec id elit non mi porta gravida at eget metus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>
        <!-- /#wrapper -->
@stop
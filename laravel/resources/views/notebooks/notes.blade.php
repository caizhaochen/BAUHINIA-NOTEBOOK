{{--@extends('notebooks.create)--}}

{{--@section('notes')--}}


<div class="dropdown">
    <label type="button" class="btn dropdown-toggle" id="dropdownMenu2"
           data-toggle="dropdown">
        <span id="Notes" data-content="null"><i class="fa fa-fw fa-file"></i>笔记</span>
        <span class="caret"></span>
    </label>
    <ul class="dropdown-menu" id="dropdown-menu-notes" role="menu" aria-labelledby="dropdownMenu2">
        <li role="presentation">
            <a id="newnotes" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#notesmodal">
                <i class="fa fa-fw fa-file"></i>
                创建新笔记
            </a>
        </li>
        <li role="presentation" class="divider"></li>
        @if($notes==null)
            <li role="presentation">
                <i role="menuitem" tabindex="-1" href="" name="null" class="notehref">no notes</i>
            </li>
        @else
            @forelse($notes as $note)
                <li role="presentation" style="display: block" class="notesli" value="{{$note->notebook_id}}">
                    <a role="menuitem" tabindex="-1" href="#" name="{{$note->note_id}}" class="notehref">{{$note->title}}</a>
                </li>
            @empty
                <li role="presentation">
                    <i role="menuitem" tabindex="-1" href="#" name="null" class="notehref">no notes</i>
                </li>
            @endforelse
        @endif




    </ul>
</div>

<div class="modal fade" id="notesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">新建笔记</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('notes/create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="notebook_id" class="chooselabel">
                            笔记本
                        </label>
                        <select name="notebook_id" class="form-control">
                            {{--<option selected="selected">--请选择--</option>--}}
                            @forelse($notebooks as $notebook)
                                <option value="{{$notebook->notebook_id}}">{{$notebook->name}}</option>
                            @empty
                                <option>no notebooks</option>
                            @endforelse

                        </select>

                        <label for="title">
                            笔记标题
                        </label>
                        <input class="form-control" type="text" name="title">
                        <label for="tag">
                            笔记tag
                        </label>
                        <input class="form-control" type="text" name="tag" value="none">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Done">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


{{--@endsection--}}
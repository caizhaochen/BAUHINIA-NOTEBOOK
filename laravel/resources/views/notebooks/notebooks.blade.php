


<div class="dropdown">
    <label type="button" class="btn dropdown-toggle" id="dropdownMenu1"
           data-toggle="dropdown">
        <span id="Notebook"><i class="fa fa-fw fa-book"></i>笔记本</span>
        <span class="caret"></span>
    </label>
    <ul class="dropdown-menu" id="dropdown-menu-books" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation">
            <a id="newbook" role="menuitem" tabindex="-1" href="#" data-toggle="modal" data-target="#booksmodal">
                <i class="fa fa-fw fa-book"></i>
                创建新笔记本
            </a>
        </li>
        <li role="presentation" class="divider"></li>
        @forelse($notebooks as $notebook)
            <li role="presentation">
                {{--<a role="menuitem" tabindex="-1" href="{{URL::route('show',$notebook->id)}}">{{$notebook->name}}</a>--}}
                <a role="menuitem" tabindex="-1" href="#" name="{{$notebook->notebook_id}}" class="notebookhref">{{$notebook->name}}</a>
            </li>
        @empty
            <li role="presentation">
                <i role="menuitem" tabindex="-1" href="#" >no notebooks</i>
            </li>
        @endforelse
    </ul>
</div>

<div class="modal fade" id="booksmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">新建笔记本</h4>
            </div>
            <div class="modal-body">
                <form action="{{url('notebooks/store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">
                            笔记本名字
                        </label>
                        <input class="form-control" type="text" name="name">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Done">
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


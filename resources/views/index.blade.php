<!DOCTYPE html>
<html>
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Alternative to the deferred styles -->
    <!--Import Google Icon Font-->


    <!--link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" defer-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Patrick+Hand+SC" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" id="myModalHeader">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <div id="modalText"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul class="nav nav-pills pull-right">
                <li role="presentation" class="active"><a href="#">Home</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Castus Todo</h3>
    </div>

    <div id="todoApp">
        <div class="panel panel-default">
            <div class="panel-heading">
                Stuff I need to do...
            </div>
            <div class="panel-body">
                @if (count($todos))
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 40px;">Completed?</th>
                                <th>Todo</th>
                                <th>Due at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($todos as $todo)
                            <tr  @if ($todo['completed'])class="completed"@endif>
                                <td style="text-align: center">
                                    <input
                                            type="checkbox"
                                            class="toggleCompleted"
                                            value="{{$todo['id']}}"
                                            @if ($todo['completed'])
                                                checked
                                            @endif
                                    >
                                </td>
                                <td>{{$todo['todo']}}</td>
                                <td>{{ $todo['due_at'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-danger btn-sm" id="deleteCompleted">Delete Completed Items</button>
                @else
                    Congratulations, you have nothing to do.<br>
                    Why not add some items to your list?
                @endif
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Add a new item
            </div>
            <div class="panel-body">
                {!! Form::open(array('url' => '/', 'class' => 'form-inline')) !!}
                <div class="form-group col-xs-12">
                    {!! Form::text('todoItem', '', array('class' => 'form-control', 'style' => 'width: 100%', 'required' => 'required')) !!}
                </div>
            </div>
            <div class="panel-heading">
                To be done by
            </div>
            <div class="panel-body">
                <div class="form-group col-xs-10">
                    {!! Form::datetimeLocal('due_at', '', [
                    'class' => 'form-control',
                    'min' => \Carbon\Carbon::now()->format('Y-m-d\TH:i')]) !!}
                </div>
                {!! Form::submit('Add', array('class' => "btn btn-success")) !!}
                {!! Form::token() !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!--script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script-->
<script src="https://unpkg.com/vue"></script>
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/app.js') }}"></script>
</body>
</html>
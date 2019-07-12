@extends('main')
@section('content')

{!! Form::model( $todo, array('route' => ['todos.update', $todo->id], 'method' => 'PUT' ,'class' => 'wwc-form-wrapper shadow-sm') ) !!}

    <h3 class="wwc-form-title">New Task</h3>
    <div class="wwc-fields-wrapper d-flex justify-content-between">
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('deadline', 'Deadline') !!}
            {!! Form::date('deadline', null, array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::TextArea('description', null, array('class' => 'form-control', 'rows' => '4')) !!}
    </div>
    <div class="d-flex justify-content-end">
        {!! link_to_route('index', 'Cancel', [], ['class' => 'btn wwc-cancel-btn']) !!}
        {!! Form::submit('Edit Task', array('class' => 'btn text-white wwc-create-task-btn')) !!}
    </div>
{{ Form::close() }}

@stop
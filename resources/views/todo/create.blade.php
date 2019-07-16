@extends('main')
@section('content')

<form action="{{ route('todos.store') }}" method="POST" class="wwc-form-wrapper shadow-sm">
    <h3 class="wwc-form-title">New Task</h3>
    @csrf
    <div class="wwc-fields-wrapper d-flex justify-content-between">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
            @error('title') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control">
        </div>
    </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
        </div>
        <div class="d-flex justify-content-end">
            @php

                $params = array();
                $params['status'] = (session('filterStatus') != "") ? session('filterStatus') : null ;
                $params['page'] = (session('page')) ? session('page') : null ;
    
                foreach ($params as $param => $value) {
                    if ($value == null) {
                        unset($params[$param]);
                    }
                }
    
            @endphp
            <a href="{{ route('index', $params) }}" class="btn wwc-cancel-btn">Cancel</a>
            <button type="submit" class="btn text-white wwc-create-task-btn">Create Task</button>
        </div>
</form>

@stop
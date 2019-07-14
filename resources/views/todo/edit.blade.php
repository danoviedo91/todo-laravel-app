@extends('main')
@section('content')

<form action="{{ route('todos.update', ['id'=>$todo->id]) }}" method="POST" class="wwc-form-wrapper shadow-sm">
    <h3 class="wwc-form-title">Edit Task</h3>
    @method('PUT')
    @csrf
    <div class="wwc-fields-wrapper d-flex justify-content-between">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $todo->title) }}">
            @error('title') <div class="invalid-feedback help-block">{{ $message }}</div> @enderror
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $todo->deadline) }}">
        </div>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="4" class="form-control">{{ old('description', $todo->description) }}</textarea>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{ route('index') }}" class="btn wwc-cancel-btn">Cancel</a>
        <button type="submit" class="btn text-white wwc-create-task-btn">Edit Task</button>
    </div>

</form>

@stop
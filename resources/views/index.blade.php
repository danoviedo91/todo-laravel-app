@extends('main')
@section('content')
<div class="d-flex justify-content-end wwc-mx-32">
	<div class="my-auto mr-auto wwc-ml-30">
			<span>Logged in as {{ $user->first_name }}&nbsp;{{ $user->last_name }}</span>
	</div>
		<a class="btn wwc-add-task-btn text-white" href="{{ route('todos.create') }}">Add Task</a>
</div>

<div class="wwc-tasks-container">
	<table class="table table-borderless mb-4" id="wwc-task-table">
		<thead class="thead-dark">
			<tr>
				<th class="wwc-task-name wwc-thead-first-element">Task</th>
				<th class="wwc-task-date-and-actions-regular">Complete by</th>
				<th class="wwc-task-date-and-actions-regular">Actions</th>
			</tr>
		</thead>

		@if ( !sizeof($todos) )
			<tbody>
				<tr>
					@if ( session('filterStatus') == "")
						<td colspan="3" id="wwc-notasks-msg">No tasks to show</td>
					@endif
					@if ( session('filterStatus') == "incompleted")
						<td colspan="3" id="wwc-notasks-msg">No incompleted tasks to show</td>
					@endif
					@if ( session('filterStatus') == "completed")
						<td colspan="3" id="wwc-notasks-msg">No completed tasks to show</td>
					@endif
				</tr>
			</tbody>
		@endif

		<tbody>

			@foreach($todos as $todo)
			
			<tr>

				<td class="wwc-task-name">
						<form action="{{ route('todos.update', ['id'=>$todo->id]) }}" method="POST" class="d-inline-block">
							@csrf
							@method('PATCH')
							@if ( $todo->completed )
								<button class="wwc-complete-check wwc-task-completed wwc-btn-wrap" type="submit"><i class="far fa-check-circle"></i></button>
							@endif
							@if ( !$todo->completed )
								<button class="wwc-complete-check wwc-task-incompleted wwc-btn-wrap" type="submit"><i class="far fa-check-circle"></i></button>
							@endif
						</form>
					<a href="{{ route('todos.show', ['todo'=>$todo->id]) }}" class="wwc-task-title">{{ $todo->title }}</a>
				</td>

				<td class="wwc-task-date-and-actions-regular">{{ date('d F Y', strtotime($todo->deadline)) }}</td>

				<td class="wwc-task-date-and-actions-regular">

				<a href="{{ route('todos.edit', ['todo' => $todo->id]) }}" class="wwc-edit-item"><i class="fas fa-pencil-alt"></i></a>

				<form action="{{ route('todos.destroy', ['id'=>$todo->id]) }}" method="POST" class="d-inline">
					@csrf
					@method('DELETE')
					<button type="submit" class="wwc-btn-wrap"><i class="far fa-trash-alt"></i></button>
				</form>

				</td>

			</tr>

			@endforeach
		</tbody>
	</table>

	<div class="d-flex justify-content-center">

		{{ $todos->appends(['status' => session('filterStatus')])->links() }}

	</div>

</div>

@stop
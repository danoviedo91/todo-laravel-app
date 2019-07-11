@extends('main')
@section('content')
<div class="d-flex justify-content-end wwc-mx-32">
	<div class="my-auto mr-auto wwc-ml-30">
			<span>Logged in as Daniel Oviedo</span>
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

		<tbody>
			<tr>
				<td colspan="3" id="wwc-notasks-msg">No tasks to show</td>
			</tr>
		</tbody>

		{{-- <tbody>

			<%= for (task) in todo { %>

			<tr>

				<td class="wwc-task-name">

					<%= if (task.Completed) { %>
						<form action="<%= changeStatusPath({todo_id: task.ID}) %>" class="d-inline-block" method="POST">
							<input type="hidden" name="_method" value="PATCH">
							<input name="authenticity_token" type="hidden" value="<%= authenticity_token %>">
							<button class="wwc-complete-check wwc-task-completed" type="submit"><i class="far fa-check-circle"></i></button>
						</form>
					<% } else { %>
						<form action="<%= changeStatusPath({todo_id: task.ID}) %>" class="d-inline-block" method="POST">
							<input type="hidden" name="_method" value="PATCH">
							<input name="authenticity_token" type="hidden" value="<%= authenticity_token %>">
							<button class="wwc-complete-check wwc-task-incompleted" type="submit"><i class="far fa-check-circle"></i></button>
						</form>
					<% } %>

					<a href="<%= showPath({todo_id: task.ID }) %>" class="wwc-task-title"><%= task.Title %></a>

				</td>

				<%= if (isAdmin) { %>

					<%= for (user) in users { %>
						<%= if (user.ID.String() == task.UserID.String()) { %>

							<%= if (user.IsAdmin) { %>
								<td class="wwc-task-owner"><span class="align-middle"><%= user.FirstName %>&nbsp;<%= user.LastName %>&nbsp;</span><span class="badge badge-secondary wwc-bg-darbklue">admin</span></td>  
							<% } %>

							<%= if (!user.IsAdmin) { %>
								<td class="wwc-task-owner"><%= user.FirstName %>&nbsp;<%= user.LastName %></td>
							<% } %>

						<% } %>
					<% } %>

				<% } %>

				<td class="wwc-task-date-and-actions-regular"><%= task.Deadline.Day() %> <%= task.Deadline.Month() %>
					<%= task.Deadline.Year() %></td>

				<td class="wwc-task-date-and-actions-regular">
					<a href="<%= editPath({todo_id: task.ID}) %>" class="wwc-edit-item"><i class="fas fa-pencil-alt"></i></a>
					<a class="js-wwc-trash-btn" href="<%= deletePath({todo_id: task.ID}) %>" data-method="DELETE"
						data-confirm="Are you sure?"><i class="far fa-trash-alt"></i></a>
				</td>

			</tr>

			<% } %>
		</tbody> --}}
	</table>

</div>
@stop
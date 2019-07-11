<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Todo List</title>
	{{ HTML::style('css/app.css') }}
</head>

  <body>
    <header>
			
      <nav class="wwc-navbar navbar navbar-light bg-light text-white shadow">
        <div class="d-flex">
          <a href="/" class="wwc-home-link"><span
              class="wwc-navbar-brand navbar-brand mb-0 h1 text-white d-flex align-items-center font-size-navbar">ToDo
              List</span></a>
          <div class="wwc-uncompleted-and-date">
            <span class="wwc-number-of-incompleted-tasks">0 Incompleted Tasks</span><br>
            <span class="wwc-today-date">Check your calendar</span>
          </div>
        </div>

        <div class="ml-auto">
          <ul class="d-flex align-items-center list-unstyled m-0 mr-5">

            <li><a href="/" class="text-white wwc-nav-link wwc-nav-first-link wwc-active-link">All Tasks</a></li>
            <li><a href="/?status=incompleted" class="text-white wwc-nav-link wwc-nav-first-link">Incompleted Tasks</a></li>
            <li><a href="/?status=completed" class="text-white wwc-nav-link">Completed Tasks</a></li>

          </ul>
        </div>
        <a class="btn wwc-btn-contrast text-white" href="/signout" data-method="DELETE">Sign Out</a>
      </nav>
		</header>

		@yield('content')

		{{ HTML::script('js/app.js') }}
</body>

</html>
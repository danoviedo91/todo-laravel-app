<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Todo List</title>
	{{ HTML::style(secure_url('css/app.css')) }}
</head>

  <body>
    <header>
			
      <nav class="wwc-navbar navbar navbar-light bg-light text-white shadow">
        <div class="d-flex">
          <a href="/" class="wwc-home-link"><span
              class="wwc-navbar-brand navbar-brand mb-0 h1 text-white d-flex align-items-center font-size-navbar">ToDo
              List</span></a>
          <div class="wwc-uncompleted-and-date">
            <span class="wwc-number-of-incompleted-tasks">
              @if ( session('numberOfPendingTodoes') == 1 )
                {{ session('numberOfPendingTodoes') }} Incompleted Task                 
              @endif
              @if ( session('numberOfPendingTodoes') != 1 )
                {{ session('numberOfPendingTodoes') }} Incompleted Tasks                 
              @endif
            </span><br>
            <span class="wwc-today-date">{{ date('l d, F Y', strtotime( today() )) }}</span>
          </div>
        </div>

        <div class="ml-auto">
          <ul class="d-flex align-items-center list-unstyled m-0">

            @if (session('filterStatus') == null && isset($mainViewFlag) )
              <li>{!! link_to_route('index', 'All Tasks', [], ['class' => 'text-white wwc-nav-link wwc-nav-first-link wwc-active-link']) !!}</li>
            @else
              <li>{!! link_to_route('index', 'All Tasks', [], ['class' => 'text-white wwc-nav-link wwc-nav-first-link']) !!}</li>
            @endif

            @if (session('filterStatus') == "incompleted" && isset($mainViewFlag))
              <li>{!! link_to_route('index', 'Incompleted Tasks', ['status' => 'incompleted'], ['class' => 'text-white wwc-nav-link wwc-nav-first-link wwc-active-link']) !!}</li>
            @else
              <li>{!! link_to_route('index', 'Incompleted Tasks', ['status' => 'incompleted'], ['class' => 'text-white wwc-nav-link wwc-nav-first-link']) !!}</li>
            @endif

            @if (session('filterStatus') == "completed" && isset($mainViewFlag))
              <li>{!! link_to_route('index', 'Completed Tasks', ['status' => 'completed'], ['class' => 'text-white wwc-nav-link wwc-active-link']) !!}</li>
            @else
              <li>{!! link_to_route('index', 'Completed Tasks', ['status' => 'completed'], ['class' => 'text-white wwc-nav-link']) !!}</li>
            @endif

          </ul>
        </div>
      </nav>
		</header>

		@yield('content')

    {{ HTML::script(secure_url('js/app.js')) }}
    
</body>

</html>
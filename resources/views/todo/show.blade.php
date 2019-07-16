@extends('main')
@section('content')

<div class="wwc-form-wrapper shadow-sm">
    <h3 class="wwc-form-title">View Task</h3>
        <div class="wwc-fields-wrapper">
            <p><strong>Title:</strong>&nbsp;{{ $todo->title }}</p>
            <p><strong>Description:</strong>&nbsp;{{ $todo->description }}</p>
            <p><strong>Complete By:</strong>&nbsp;{{ date('d F Y', strtotime($todo->deadline)) }}</p>
            <p><strong>Completed:</strong>
            @if ($todo->completed)
                Yes
            @endif
            @if (!$todo->completed)
                No
            @endif
            </p>
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
        <a class="btn wwc-cancel-btn" href="{{ route('index', $params) }}">Done</a>
    </div>
</div>

@stop
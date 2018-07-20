@extends('theme.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tasks</h1>
        <button type="button" class="btn btn-primary">Another</button>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task) 
        <tr>
            <td>{{ $task->task_title }}</td>
            <td>{{ $task->task_desc }}</td>
            <td><a href="/tasks/edit/{{ $task->task_id }}" class="btn btn-info" role="button">Edit</a></td>
            <td><a href="/tasks/completed/{{ $task->task_id }}" class="btn btn-success" role="button">Completed</a></td>           
            <td><button type="button" data-id="{{ $task->task_id }}" class="btn btn-danger delete">Delete</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
<!-- <meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">

    $('.delete').on('click', function(){
        let pointed = $(this).attr("data-id");
        $.ajax({
            url: '/tasks/delete',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {id:id,"_token": "{{ csrf_token() }}"},
            async: true,
            success: function(data) {
                window.location.replace('/tasks');
            }
        });
    });
</script> -->

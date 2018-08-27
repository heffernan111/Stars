@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
             @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">User List</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tbody>
                                    <tr>
                                        <th>Title</th>
                                        <th>content</th>
                                        <th>created by</th>
                                        <th>Status</th>
                                        <th>created</th>
                                        <th>updated</th>
                                    </tr>
                            </thead>    
                                    @foreach($tasks as $task)
                                    <tr>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->content }}</td>
                                        <td>{{ $task['user']['name'] }}</td>
                                        <td>{{ $task->stage }}</td>
                                        <td>{{ $task->created_at }}</td>
                                        <td>{{ $task->updated_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>                
                    </div>
                </div>
            </div>
        </div>         
    </div>
</div>
@endsection

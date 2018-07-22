@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">User List</div>
                    <div class="card-body">
                	<div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Ban</th>
                                <th>Delete</th>
                            </tr>
                        </thead>    
                        @foreach($users as $users)
                        <tr>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->role_id }}</td>
                            <td>{{ $users->email }}</td>
							<td><a href="/user/edit/{{ $users->id }}" class="btn btn-info" role="button">Edit</a></td>
							<td><a href="/user/ban/{{ $users->id }}" class="btn btn-danger" role="button">Ban</a></td>
							<td><a href="/user/delete/{{ $users->id }}" class="btn btn-warning" role="button">Delete</a></td>
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

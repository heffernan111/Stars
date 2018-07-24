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
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user['roles'][0]['name'] }}</td>
                            <td>{{ $user->email }}</td>
							<td><a href="/admin/users/edit/{{ $user->id }}" class="btn btn-info" role="button">Edit</a></td>
							<td><a href="/admin/users/ban/{{ $user->id }}" class="btn btn-danger" role="button">Ban</a></td>
							<td><a href="/admin/users/delete/{{ $user->id }}" class="btn btn-warning" role="button">Delete</a></td>
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

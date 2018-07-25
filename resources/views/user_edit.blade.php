@extends('layouts.admin')

@section('content')
<div class="content">
	<!-- Create Pages -->
	<div class="col-xs-6">
		<h1>Edit User</h1>
		<form action="/admin/users/update" method="post" enctype="multipart/form-data">
			@csrf
			<input name="id" type="hidden" value="{{ $users->id }}">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="{{ $users->name }}">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" value="{{ $users->email }}">
			</div>
			 	<label class="radio-inline">
      				<input type="radio" name="role" checked>Admin
   				</label>
			    <label class="radio-inline">
			    	<input type="radio" name="role">User
			    </label>
			<br>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="save_user" value="Save">
			</div>
		</form>
	</div>
</div>
@endsection
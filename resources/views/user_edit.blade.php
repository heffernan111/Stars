@extends('layouts.admin')

@section('content')
<div class="content">
	<div class="row justify-content-center">
	<!-- Create Pages -->
		<div class="col-md-8">
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
					<input type="email" class="form-control" name="email" value="{{ $users->email }}">
				</div>

				<div class="form-group">
			    <label for="role">User Role</label>
			    <select class="form-control" id="role" name="role" value="2">
			    	@foreach($roles as $role)
			      <option value="{{ $role->id }}">{{ $role->name }}</option>
			      	@endforeach
			    </select>
			    </div>
				<br>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="save_user" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
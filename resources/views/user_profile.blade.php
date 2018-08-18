@extends('layouts.admin')

@section('content')
<div class="content">
	<div class="row justify-content-center">
	<!-- Create Pages -->
		<div class="col-md-8">
			<h1>Edit User</h1>
			<form action="/profile/update" method="post" enctype="multipart/form-data">
				@csrf
				<input name="id" type="hidden" value="{{ $user->id }}">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" value="{{ $user->email }}">
				</div>
				<br>
				<div class="form-group">
					<input class="btn btn-primary" type="submit" name="save_user" value="Save">
				</div>
			</form>
		</div>
		<div class="col-md-8">
        <div class="card-body">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tbody>
                        <tr>
                        	<th>Thumbnail</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
               			</thead>    
                        @foreach($images as $image)
                        <tr>
                        	<td><img src="<?php echo asset("storage/$image->file_name")?>" height="100", width="100"></img></td>
                            <td>{{ $image->image_name }}</td>
                            <td>{{ $image->image_description }}</td>
                            <td><a href="/profile/image/edit/{{ $image->id }}" class="btn btn-info" role="button">Edit</a></td>
                            <td><a href="/profile/image/delete/{{ $image->id }}" class="btn btn-danger" role="button">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>
            </table>                
        </div>
    </div>
</div>
@endsection
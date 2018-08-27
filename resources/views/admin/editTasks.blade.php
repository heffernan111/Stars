@extends('theme.default')

@section('content')
<div class="content">
	<!-- Create Pages -->
	<div class="col-xs-6">
		<h1>Edit Task</h1>
		<form action="/" method="post" enctype="multipart/form-data">
			@csrf
			<input name="id" type="hidden" value="">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" value="">
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<input type="text" class="form-control" name="email" value="">
			</div>
			<br>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="save_task" value="Save">
			</div>
		</form>
	</div>
</div>
@endsection
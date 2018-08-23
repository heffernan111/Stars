@extends('theme.default')

@section('content')
<div class="content">
	<!-- Create Pages -->
	<div class="col-xs-6">
		<h1>New Task</h1>
		<form action="/tasks/store" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="task_title" value="">
			</div>
			<div class="form-group">
				<label for="email">Description</label>
				<input type="text" class="form-control" name="task_desc" value="">
			</div>
			<br>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="create_task" value="Create">
			</div>
		</form>
	</div>
</div>
@endsection 
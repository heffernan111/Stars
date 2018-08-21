@extends('layouts.app')

@section('content')
<div class="content">
	<div class="row justify-content-center">
	<!-- Create Pages -->
		<div class="col-md-8">
			<h1>{{ $user->name }}</h1>
            @if(Auth::id() === $user->id)
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
            <button id="upload" class="btn btn-success">Upload</button>
            @endif 
            <!-- The Modal -->
                <div id="uploadModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form action="/profile/upload" method="post" enctype="multipart/form-data">
                        @csrf
                            <input name="id" type="hidden" value="{{ $user->id }}">
                                <div class="form-group">
                                    <label for="image name">Image Name</label>
                                    <input type="text" class="form-control" name="image name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control" name="image description" value="">
                                </div>
                                
                                <div class="file btn btn-info">Upload<input type="file" name="file"/></div>
                                
                                <br>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="save_user" value="Save">
                                </div>
                         </form>
                    </div>
                </div>
                <!--modal end  -->
		</div>
		<div class="col-md-10">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <h1>My Images</h1>
                        <thead>
                            <tbody>
                                <tr>
                                    <th>Thumbnail</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    @if(Auth::id() === $user->id)
                                    <th>Delete</th>
                                    @endif                           
                                </tr>
                       			</thead>    
                                @foreach($images as $image)
                                <tr>
                                	<td><img src="<?php echo asset("storage/$image->file_name")?>" height="100", width="100"></img></td>
                                    <td>{{ $image->name }}</td>
                                    <td>{{ $image->description }}</td>
                                    @if(Auth::id() === $user->id)
                                    <td><a href="/profile/image/delete/{{ $image->id }}" class="btn btn-danger" role="button">Delete</a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    {{ $images->links() }}                  
                </div>
        </div>
        

        <div class="col-md-10">
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <h1>My Documents</h1>
                        <thead>
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Tags</th>
                                    @if(Auth::id() === $user->id)
                                    <th>Delete</th>
                                    @endif                           
                                </tr>
                                </thead>    
                                @foreach($guides as $guide)
                                <tr>
                                    <td>{{ $guide->name }}</td>
                                    <td>{{ $guide->desc }}</td>
                                    <td>{{ $guide->tags }}</td>
                                    @if(Auth::id() === $user->id)
                                    <td><a href="/profile/guides/delete/{{ $guide->id }}" class="btn btn-danger" role="button">Delete</a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                    {{ $images->links() }}                  
                </div>
        </div>




    </div>
</div>
@endsection
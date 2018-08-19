@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
@auth
<div class="container">
	<div class="row justify-content-center">
		<button type="button" class="btn btn-success" id="modal">Upload</button>
	</div>
</div>
<div id="myModal" class="modal">
<!-- Modal content -->
	<div class="modal-content">
		<span class="close">&times;</span>
				<form action="/gallery/upload" method="post" enctype="multipart/form-data">
					@csrf
					<input name="id" type="hidden" value="{{ $id }}">
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
@endauth
<div class="container">
    <div class="row justify-content-center">
	        <div class="col-md-12">     	
	            <div class="card">
	                <div class="card-header">Gallery</div>
	                    <div class="card-body">
	                		@foreach($images as $image)
								<div class="card">
								 	<div class="card-header">{{ $image->name }}  by  {{ $image->user['name']." ". $image->created_at }}</div>
								  	<div class="card-body">{{ $image->description }}</div>
								  	<img src="<?php echo asset("storage/$image->file_name")?>" height="200", width="200"></img>
								  	<div class="card-footer">
								  		<div class="card-body">{{ $image->comments['content'] }}</div>
								  	</div>
								</div>
								<br>							
	                        @endforeach
	                    </div>
	            </div>			
	        </div>
    </div>
</div>



<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
@endsection

@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

@auth
<!-- Trigger/Open The Modal -->
<div class="container">
    <div class="row justify-content-center">
        <button id="upload" class="btn btn-success">Upload</button>    
    </div>
</div>
<!-- The Modal -->
<div id="uploadModal" class="modal">
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
                                        
                                    </div>
                                </div>
                                <br>                            
                            @endforeach
                        </div>
                </div>          
            </div>
    </div>
</div>
@endsection

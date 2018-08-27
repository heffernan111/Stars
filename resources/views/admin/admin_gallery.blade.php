@extends('layouts.admin')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
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
                                     <td><a href="/profile/image/delete/{{ $image->id }}" class="btn btn-danger" role="button">Delete</a></td>   
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

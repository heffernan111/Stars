@extends('layouts.app')

@section('content')
<div class="container">
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
            <form action="/guides/upload" method="post" enctype="multipart/form-data">
            @csrf
                <input name="user_id" type="hidden" value="{{ $id }}">
                    <div class="form-group">
                        <label for="image name">Name</label>
                        <input type="text" class="form-control" name="name" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="desc" value="">
                    </div>
                    <div class="form-group">
                        <label for="description">Tag</label>
                        <input type="text" class="form-control" name="tags" value="">
                    </div>                    
                    <div class="file btn btn-info">Upload<input type="file" name="file"/>
                    </div>                    
                    <br>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="save_user" value="Save">
                    </div>
             </form>
        </div>
    </div>
@endauth    
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card">
                <div class="card-header">User List</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Tags</th>
                                        <th>Download</th>
                                        </tr>
                            </thead>    
                                    @foreach($guides as $guide)
                                    <tr>
                                        <td>{{ $guide->name }}</td>
                                        <td>{{ $guide->desc }}</td>
                                        <td>{{ $guide->tags }}</td>
                                        @if(Auth::check())
                                        <td><a href="storage/{{ $guide->file_name }}"  class="btn btn-info" role="button">Download</a></td>
                                        @else
                                        <td><a href="{{ route('login') }}"  class="btn btn-warning" role="button">Log In</a></td>
                                        @endif
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

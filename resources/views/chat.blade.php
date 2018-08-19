@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Live Chat</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <th>Message</th>
                                <th>Time</th>
                            </tr>
                        </thead>    
                        @foreach($chats as $chat)
                        <tr>
                            <td>{{ $chat->user_id }}</td>
                            <td>{{ $chat->text }}</td>
                            <td>{{ $chat->created_at }}</td>

                        </tr>
                        @endforeach
                        </tbody>
                        </table>   
                        {{ $chats->links() }}             
                        <form action="/chat/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="text">Text</label>
                            <input type="text" class="form-control" name="text">
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection

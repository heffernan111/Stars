@extends('theme.default')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">My Friends</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Profile</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td><a href="/users/profile/{{ $user->id }}" class="btn btn-info" role="button">Profile</a></td>
            <td><a href="/users/follow/{{ $user->id }}" class="btn btn-info" role="button">Message</a></td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
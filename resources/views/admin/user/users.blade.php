@extends('layouts.admin_layout')

@section('content')

<h2>Users</h2>
<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Joined</th>
        <th>Action</th>
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($users as $user)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$user->name}} </td>
        <td> {{$user->email}} </td>
       
        <td> {{$user->created_at}} </td>
        <td> <a href="/admin/mail/user/{{$user->email}} " class="btn btn-primary">Send Email</a> </td>

    </tr>
    @endforeach

</table>
    
@endsection
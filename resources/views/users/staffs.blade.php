@extends('layouts.admin_layout')


@section('content')
<h1>Staffs</h1>
<div>
    <a href="/admin/user/staff/add" class="btn btn-primary">Add Staff</a>
</div>
<br>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Joined</th>
        
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($staffs as $user)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$user->name}} </td>
        <td> {{$user->email}} </td>
       
        <td> {{$user->created_at}} </td>
        

    </tr>
    @endforeach

</table>
@endsection
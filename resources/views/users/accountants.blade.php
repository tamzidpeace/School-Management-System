@extends('layouts.admin_layout')


@section('content')
<h1>Accountants</h1>

<div>
    <a href="/admin/user/accountant/add" class="btn btn-primary">Add Accountant</a>
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

    @foreach ($accountants as $user)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$user->name}} </td>
        <td> {{$user->email}} </td>
       
        <td> {{$user->created_at}} </td>
        

    </tr>
    @endforeach

</table>
    
@endsection
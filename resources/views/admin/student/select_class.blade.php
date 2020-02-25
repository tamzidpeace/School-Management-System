@extends('layouts.admin_layout')

@section('content')
<h1>Add New Student</h1>

<h3>Select Class</h3>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Class</th>

    </tr>

    @php
    $count = 1;
    @endphp
    
    @foreach ($classes as $class)
    <tr>
        <td> {{$count++}} </td>
        <td> <strong> <a style="color:blue;" href="/admin/add-new-student/{{$class->id}}"> 
            {{$class->name}} </a> </strong> </td>
    </tr>
    @endforeach

</table>
    
@endsection
@extends('layouts.admin_layout')

@section('content')

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Name</th>
        <th>Class</th>
        <th>Section</th>
        <th>Roll No</th>


    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($students as $student)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$student->name}} </td>
        <td> {{$student->schoolClass->name }} </td>
        <td> {{ $student->section->section_name }} </td>
        <td> {{ $student->roll }} </td>
    </tr>
    @endforeach

</table>

@endsection
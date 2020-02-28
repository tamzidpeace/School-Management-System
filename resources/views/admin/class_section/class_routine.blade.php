@extends('layouts.admin_layout')

@section('content')

<h2>Add New Class Routine</h2>

{!! Form::open(['method' => 'POST', 'action' => 'AdminClassRoutine@addRoutine', 'files'=> false]) !!}

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('class', 'Select Class') !!}
    {!! Form::select('class', ["" => "Select"] + $classes, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('section', 'Select Section') !!}
    {!! Form::select('section', ["" => "Select"] + $sections, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}


<h2>Class Routines</h2>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Section</th>
        <th>Class</th>
        <th>Details</th>
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($routines as $routine)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$routine->section->section_name}} </td>
        <td> {{$routine->schoolClass->name}} </td>
        <td> <a href="/admin/class/section/class-routine/details/{{$routine->id}}" class="btn btn-primary">Details</a></td>
    </tr>
    @endforeach

</table>

@endsection
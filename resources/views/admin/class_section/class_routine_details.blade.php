@extends('layouts.admin_layout')

@section('content')

<h2>Add  Period Information</h2>

{!! Form::open(['method' => 'POST', 'action' => ['AdminClassRoutine@classRoutineDetails', $id], 'files'=> false]) !!}


<div style="margin-top:15px;" class="form-group">
    {!! Form::label('period', 'Select Period') !!}
    {!! Form::select('period', ["" => "Select"] + $periods, ['class' => 'form-control']) !!}
</div>

    {!! Form::hidden('id', $id) !!}

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('day', 'Select Day') !!}
    {!! Form::select('day', ["" => "Select"] + $days, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('subject', 'Select Subject') !!}
    {!! Form::select('day', ["" => "Select"] + $subjects, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('day', 'Select Teacher') !!}
    {!! Form::select('day', ["" => "Select"] + $teachers, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

<h2>Class Routine Details</h2>

<table class="table table-bordered">
    <tr class="info">
        <th>Day/Period</th>
        <th>Satarday</th>
        <th>Sunday</th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thusday</th>
    </tr>

    @php
    $count = 1;
    @endphp

    <tr>
        <td>Period 1</td>
    </tr>
    <tr>
        <td>Period 2</td>
    </tr>
    <tr>
        <td>Period 3</td>
    </tr>
    <tr>
        <td>Period 4</td>
    </tr>
    <tr>
        <td>Period 5</td>
    </tr>    

    {{-- @foreach ($routines as $routine)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$routine->section->section_name}} </td>
        <td> {{$routine->schoolClass->name}} </td>
        <td> <a href="#" class="btn btn-primary">Details</a></td>
    </tr>
    @endforeach --}}

</table>

@endsection
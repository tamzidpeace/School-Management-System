@extends('layouts.admin_layout')

@section('content')

<h2>Add Period Information of class {{$class}}, section {{$section}} </h2>

{!! Form::open(['method' => 'POST', 'action' => ['AdminClassRoutine@savePeriodInfo', $routine->id],
'files'=> false]) !!}

<div class="form-group">
    <label for="order">Period Order(1- {{$routine->max_period}})</label>
    <input type="number" name="order" id="order">
</div>

<div class="form-group">
    <label for="name">Period Name</label>
    <input type="text" name="name" id="name" placeholder="EX:Period 1">
</div>

<div class="form-group">
    <label for="name">Time</label>
    <input type="text" name="time" id="time" placeholder="EX: 8am - 9am">
</div>

{!! Form::hidden('max_period', $routine->max_period) !!}

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

<h2>Periods Information</h2>
<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Period Order</th>
        <th>Title</th>
        <th>Time</th> 
        <th>Action</th>       
    </tr>
    
    @php
    $count = 1;
    @endphp

    @foreach ($periods as $period)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$period->order}} </td>
        <td> {{$period->name}} </td>
        <td> {{$period->time}} </td>
        <td> <a href="#" class="btn btn-primary">EDIT</a> </td>
    </tr>    
    @endforeach
    

</table>


{{-- <h2>Class Routine Details</h2>

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

{{-- </table>  --}}

@endsection
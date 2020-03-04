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
        <td> <a href="/admin/update-period/{{$period->id}}" class="btn btn-primary">UPDATE</a> </td>
    </tr>
    @endforeach


</table>

@endsection
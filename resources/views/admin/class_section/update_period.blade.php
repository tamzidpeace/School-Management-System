@extends('layouts.admin_layout')

@section('content')

<h2>Update Period Information of Class</h2>

{!! Form::open(['method' => 'POST', 'action' => ['AdminClassRoutine@updatePeriodSave', $period->id],
'files'=> false]) !!}

<div class="form-group">
    <label for="order">Period Order(1- {{$period->routine->max_period}})</label>
    <input type="number" name="order" id="order" value="{{$period->order}}">
</div>

<div class="form-group">
    <label for="name">Period Name</label>
    <input type="text" name="name" id="name" placeholder="EX:Period 1" value="{{$period->name}}" >
</div>

<div class="form-group">
    <label for="name">Time</label>
    <input type="text" name="time" id="time" placeholder="EX: 8am - 9am" value="{{$period->time}}">
</div>

{{-- {!! Form::hidden('max_period', $routine->max_period) !!} --}}

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}



@endsection
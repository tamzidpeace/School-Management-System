@extends('layouts.admin_layout')

@section('content')

<h1>Update Routine</h1>


{!! Form::open(['method' => 'POST', 'action' => ['AdminClassRoutine@updateRoutineSave', $routine->id], 
'files'=> false]) !!}

{{ csrf_field() }}


<div style="margin-top:15px;" class="form-group">
    <label for="max_period">Max Period</label>
    <input type="number" name="max_period" id="max_period" value="{{$routine->max_period}}">
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}


@endsection
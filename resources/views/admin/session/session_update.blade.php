@extends('layouts.admin_layout')

@section('content')

<h1>Session Update</h1>

@php
    $current_year = date("Y");
    for($i=0; $i<6; $i++)
        $year[$i] = $current_year--;
    
    $y = [2020,2019,2018];
@endphp


{!! Form::open( ['method' => 'POST', 'action' => 'SessionController@updateSession', 'files'=> false]) !!}

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('name', 'Session Name') !!}
    {!! Form::text('name', $session->name, ['class' => 'form-control']) !!}
</div>

{!! Form::hidden('id', $session->id) !!}

<div class="form-group">
    {!! Form::label('year', 'Select Year') !!}
    <select name="year">
        @for ($i = 0; $i < 6; $i++)
        <option value=" {{$year[$i]}} ">{{$year[$i]}}</option>
        @endfor                
    </select>
</div>

<br>    
<input type="submit" class="form-control btn btn-primary" value="Update Session Info">


{!! Form::close() !!}
    
@endsection
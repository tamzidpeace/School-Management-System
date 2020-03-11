@extends('layouts.admin_layout')


@section('content')

<h1>Sessions</h1>  <br>

@php
    $current_year = date("Y");
    for($i=0; $i<6; $i++)
        $year[$i] = $current_year--;
    
    $y = [2020,2019,2018];
@endphp

<h2>Add New Session</h2>

{!! Form::open( ['method' => 'POST', 'action' => 'SessionController@store', 'files'=> false]) !!}

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('name', 'Session Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('year', 'Select Year') !!}
    <select name="year">
        @for ($i = 0; $i < 6; $i++)
        <option value=" {{$year[$i]}} ">{{$year[$i]}}</option>
        @endfor
        
        
      </select>
</div>

<br>    
<input type="submit" class="form-control btn btn-primary" value="ADD NEW">


{!! Form::close() !!}

<br>
<h2>All Sessions</h2>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Name</th>
        <th>Year</th>
        <th>Status</th>
        <th>Action</th>
        <th>Action</th>
        
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($sessions as $user)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$user->name}} </td>
        <td> {{$user->year}} </td>
        @if ($user->status == 1)
            <td>Actice</td>
        @else 
            <td>Inactive</td>
        @endif
        <td> 
            @if ($user->status == 1)
            <a href="/admin/session/change-status/{{$user->id}}" 
                class="btn btn-danger">Make Inactive</a>
            @else 
            <a href="/admin/session/change-status/{{$user->id}}" 
                class="btn btn-success">Make Active</a>
            @endif
        </td>
        <td>
            <a class="btn btn-info" href="/admin/session/update/view/{{$user->id}}">
            Update This Session
            </a>
        </td>
                
    </tr>
    @endforeach

</table>
    
@endsection
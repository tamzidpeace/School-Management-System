@extends('layouts.admin_layout')

@section('content')
<h2>Add or Update Information of Periods</h2>

{!! Form::open(['method' => 'POST', 'action' => 'AdminClassRoutine@savePeriodDetails', 'files'=> false]) !!}

{{ csrf_field() }}

<div style="margin-top:15px;" class="form-group">
    <select name="period" id="period" class="form-control input-lg">
        <option value="">Select Period</option>
        @foreach ($periods as $key=>$value)
        <option value=" {{$key}} ">{{$value}}</option>
        @endforeach
    </select>
</div>

<div style="margin-top:15px;" class="form-group">
    <select name="day" id="day" class="form-control input-lg">
        <option value="">Select Day</option>
        @foreach ($days as $key=>$value)
        <option value=" {{$key}} ">{{$value}}</option>
        @endforeach
    </select>
</div>

<div style="margin-top:15px;" class="form-group">
    <select name="subject" id="subject" class="form-control input-lg">
        <option value="">Select Subject</option>
        @foreach ($subjects as $key=>$value)
        <option value=" {{$key}} ">{{$value}}</option>
        @endforeach
    </select>
</div>

<div style="margin-top:15px;" class="form-group">
    <select name="teacher" id="teacher" class="form-control input-lg">
        <option value="">Select Teacher</option>
        @foreach ($teachers as $key=>$value)
        <option value=" {{$key}} ">{{$value}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}


<h2>Class Routine Details</h2>

<table class="table table-bordered">
    <tr class="info">
        <th>Period/Day</th>
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

    

    @for ($i = 1; $i <= $max_period; $i++)
    <tr>
        <td>Period {{$i}} </td>
        
        @if ($data[$i]['teacher_id'] !=0 )
        <td> {{$data[$i]['teacher_id']}} </td>
        @else 
        <td> blank </td>
        @endif

        @if ($data2[$i]['teacher_id'] !=0 )
        <td> {{$data2[$i]['teacher_id']}} </td>
        @else 
        <td> blank </td>
        @endif
        <td>2</td>
        
        
        
    </tr>
    @endfor
    



</table>

@endsection
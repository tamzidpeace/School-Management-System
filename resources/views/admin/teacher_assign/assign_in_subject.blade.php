@extends('layouts.admin_layout')

@section('content')
<h1> <strong>Assign Teacher for a Subject</strong> </h1>

<br>

{!! Form::open(['method'=> 'post', 'action'=>'AdminAssignTeacher@subjectAssignSave']) !!}


<div class="form-group">
    <label for="class">Select Teacher</label>
    <select name="teacher" id="teacher" class="form-control">
        <option value="">----</option>
        @foreach ($teachers as $key=>$value)
        <option value=" {{$key}} ">{{$value}} </option>
        @endforeach
    </select>

    <div class="form-group">
        <label for="teacher">Select Subject</label>
        <select name="subject" id="subject" class="form-control">
            <option value="">----</option>
            @foreach ($subjects as $key => $value)
            <option value=" {{$key}} "> {{$value}} </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
    </div>
</div>

{!! Form::close() !!}



@endsection
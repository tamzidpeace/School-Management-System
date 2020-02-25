@extends('layouts.admin_layout')

@section('content')

<div class="card-header">Sections</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

   

    {!! Form::open(['method' => 'POST', 'action' => 'AdminController@section', 'files'=> true]) !!}

    <div style="margin-top:15px;" class="form-group">
        {!! Form::label('name', 'Section Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div style="margin-top:15px;" class="form-group">
        {!! Form::label('class', 'Class') !!}
        {!! Form::select('class',  ['' => 'Choice Class'] + $classes, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}



    <table class="table table-bordered">
        <tr class="info">
            <th>#</th>
            <th>Section</th>
            <th>Class</th>

        </tr>

        @php
        $count = 1;
        @endphp

        @foreach ($sections as $section)
        <tr>
            <td> {{$count++}} </td>
            <td> {{$section->section_name}} </td>
            <td> {{ $section->schoolClass->name }} </td>
        </tr>
        @endforeach

    </table>

</div>


@endsection
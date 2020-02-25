@extends('layouts.admin_layout')

@section('content')

<div class="card-header">All Classes of The School</div>

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    

    {!! Form::open(['method' => 'POST', 'action' => 'AdminController@class', 'files'=> true]) !!}

    <div style="margin-top:15px;" class="form-group">
        {!! Form::label('name', 'Class Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}



    <table class="table table-bordered">
        <tr class="info">
            <th>#</th>
            <th>Name</th>

        </tr>

        @php
        $count = 1;
        @endphp

        @foreach ($classes as $class)
        <tr>
            <td> {{$count++}} </td>
            <td> {{$class->name}} </td>
        </tr>
        @endforeach

    </table>

</div>


@endsection
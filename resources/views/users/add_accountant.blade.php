@extends('layouts.admin_layout')

@section('content')

<h1>Add Accountant</h1>

{!! Form::open(['method' => 'POST', 'action' => 'UserController@addAccountantSave', 'files'=> true]) !!}

<div style="margin-top:15px;" class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('con_pass', 'Confirm Password') !!}
    {!! Form::password('con_pass', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('designation', 'Designation') !!}
    {!! Form::text('designation', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('image', 'Profile Picture') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>
<br>
<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}


@endsection
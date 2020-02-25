@extends('layouts.admin_layout')

@section('content')

<h3>Add New Student at Class <u> {{ $class->name }} </u>  </h3>

{!! Form::open( ['method' => 'POST', 'action' => 'AdminController@addNewStudentSave', 'files'=> true]) !!}

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

{{ Form::hidden('class_id', $id) }}

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('section', 'Section') !!}
    {!! Form::select('section', ['' => 'Choice Class'] + $sections, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('roll', 'Roll No') !!}
    {!! Form::number('roll', 01, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('image', 'Profile Picture') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}



</div>
</div>
    
@endsection
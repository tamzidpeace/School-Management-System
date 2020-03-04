@extends('layouts.admin_layout')

@section('content')

<h2>Update Information</h2>
<br>

<a href="/admin/school/info/" class="btn btn-info" id="sc-info">Go Back</a>

{{-- update information table --}}
{!! Form::open(['method'=>'post', 'action'=>'AdminController@updateInfoSave']) !!}

<div class="form-group">
    <label for="sc-name">School Name</label>
    <input type="text" name="name" value=" {{$info->name}} " id="sc-name" class="form-control" placeholder="Enter School Name">
</div>

<div class="form-group">
    <label for="sc-about">School About</label>
    <textarea name="about"  id="sc-about" rows="4" cols="50"> {{$info->about}} </textarea>
</div>

<input type="submit" value="UPDATE" class="btn btn-primary">

{!! Form::close() !!}

@endsection
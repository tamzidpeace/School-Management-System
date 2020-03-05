{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> --}}
@extends('layouts.admin_layout')

@section('content')


{{-- update information table --}}
{!! Form::open(['method'=>'get', 'action'=>'EmailController@adminSendMail']) !!}

<div class="form-group">
    <label for="sc-name">Email</label>
    <input type="email" name="email" value="" id="sc-name" class="form-control"
        placeholder="Receiver Email">
</div>

<div class="form-group">
    <label for="sc-name">Subject</label>
    <input type="text" name="subject" value="" id="sc-name" class="form-control"
        placeholder="Email Subject">
</div>

<div class="form-group">
    <label for="sc-about">Message</label>
    <textarea name="message" id="sc-about" rows="4" cols="50"> </textarea>
</div>

<input type="submit" value="Send Mail" class="btn btn-primary">

{!! Form::close() !!}

@endsection
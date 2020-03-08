@extends('layouts.admin_layout')

@section('content')

<h2>Upload notices</h2> <br>

{!! Form::open( ['method' => 'POST', 'action' => 'AdminController@noticeSave', 'files'=> true]) !!}

<div class="form-group">
    <label for="Title" class="form-control">Title</label>
    <input type="text" name="title" id="title" class="form-control">
</div>

<div class="form-group">
    <label for="notice" class="form-control">Notice</label>
    <textarea name="notice" id="notice" cols="30" rows="5"></textarea>
</div>

<div class="form-group">
     <label for="file">Upload</label>
     <input type="file" name="notice-file" class="form-control-file" id="exampleFormControlFile1">
    
</div>
<br>    
<input type="submit" class="form-control btn btn-primary" value="Publish">


{!! Form::close() !!}
    
@endsection
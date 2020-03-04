@extends('layouts.admin_layout')

@section('content')

<h2>School Information</h2> <br>

<a href="/admin/school/info/update" class="btn btn-info" id="sc-info">Update Information</a>
<p><strong>School Name:</strong> {{$info->name}} </p>
<p> <strong>About:</strong>  {{$info->about}} </p>
    
@endsection
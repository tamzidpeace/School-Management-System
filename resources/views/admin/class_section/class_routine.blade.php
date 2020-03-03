@extends('layouts.admin_layout')

@section('content')

<h2>Add New Class Routine</h2>

{!! Form::open(['method' => 'POST', 'action' => 'AdminClassRoutine@addRoutine', 'files'=> false]) !!}

{{ csrf_field() }}

<div style="margin-top:15px;" class="form-group">
    <select name="class" id="class" class="form-control input-lg">
        <option value="">Select Class</option>
        @foreach ($classes as $key=>$value)
        <option value=" {{$key}} ">{{$value}}</option>
        @endforeach
    </select>

</div>

<div style="margin-top:15px;" class="form-group">
    <select name="section" id="section" class="form-control input-lg">
        <option value="">Select Section</option>
    </select>
</div>

<div style="margin-top:15px;" class="form-group">
    <label for="max_period">Enter Max Number of Periods in a Day</label>
    <input type="number" name="max_period" id="max_period">
</div>

<div class="form-group">
    {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}


<h2>Class Routines</h2>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Section</th>
        <th>Class</th>
        <th>Max Period</th>
        <th>Periods</th>        
        <th>Routine</th>
        <th>Action</th>
    </tr>

    @php
    $count = 1;
    @endphp

    @foreach ($routines as $routine)
    <tr>
        <td> {{$count++}} </td>
        <td> {{$routine->section->section_name}} </td>
        <td> {{$routine->schoolClass->name}} </td>
        <td> {{$routine->max_period}} </td>
        <td> <a href="/admin/class/section/class-routine/periods/{{$routine->id}}" class="btn btn-primary">Info</a></td>
        <td> <a href="/admin/class/section/class-routine/periods/details/{{$routine->id}}"
                class="btn btn-primary">Info</a> </td>
        <td> <a href="/admin/update-class-routine/{{$routine->id}}" 
            class="btn btn-primary">UPDATE</a> </td>

    </tr>
    @endforeach

</table>

<script>
    $(document).ready(function(){
        //console.log('working');
        $('select[name="class"]').on('change', function(){
            var class_id = $(this).val();
            //console.log(class_id);
            if(class_id) {
                $.ajax({
                    url:'/getSections/'+class_id,
                    method: 'GET',
                    dataType: 'json',
                    success:function(data){
                        //console.log(data);
                        $('select[name="section"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="section"]')
                            .append('<option value="'+ key +'">'+ value +'</option>');
                        });    
                    }
                });
            }
        });
    });

</script>

@endsection
@extends('layouts.admin_layout')

@section('content')
<h1>Assign Teacher for a Section</h1>

<br>

{!! Form::open(['method'=> 'post', 'action'=>'AdminAssignTeacher@sectionAssignSave']) !!}


<div class="form-group">
    <label for="class">Select class</label>
    <select name="class" id="class" class="form-control">
        <option value="">----</option>
        @foreach ($classes as $key=>$value)
        <option value=" {{$key}} ">{{$value}} </option>
        @endforeach
    </select>

    <div style="margin-top:15px;" class="form-group">
        <label for="section">Select Section</label>
        <select name="section" id="section" class="form-control input-lg">
            <option value="">----</option>
        </select>
    </div>

    <div class="form-group">
        <label for="teacher">Select Teacher</label>
        <select name="teacher" id="teacher" class="form-control">
            <option value="">----</option>
            @foreach ($teachers as $key => $value)
            <option value=" {{$key}} "> {{$value}} </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        {!! Form::submit('SAVE', ['class' => 'btn btn-success']) !!}
    </div>
</div>

{!! Form::close() !!}


<script>
    $(document).ready(function(){
        //console.log('working');
        $('select[name="class"]').on('change', function() {
            var class_id = $(this).val();
            //console.log(class_id);
            if(class_id) {
                $.ajax({
                    url:'/getSections/'+class_id,
                    type:'GET',
                    dataType:'JSON',
                    success:function(data) {
                        $('select[name="section"]').empty()
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
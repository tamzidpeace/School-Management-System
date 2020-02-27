@extends('layouts.admin_layout')

@section('content')

<div class="container">
    <div class="row">
        {{-- syllabus upload form --}}
        <div class="col-md-8">
            <h3>Add New Subject</h3>
            <hr>
            <form class="" method="post" action="/admin/subject/add" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="year">Class</label>

                    <select name="class" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Select Class</option>

                        <?php foreach ($classes as $class) { ?>
                        <option value=" {{ $class->id }} "> {{ $class->name }} </option>
                        <?php } ?>

                    </select>

                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input name="subject" type="text" class="form-control" id="subject" placeholder="Enter Subject Name">
                    </div>


                </div>
                

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Add Subject</button>
                </div>
            </form>

        </div>
        <br>
        {{-- end of syllabus upload form --}}

        {{-- show list of syllabus --}}
        <div class="col-md-10">
            <h3>All Subjects</h3>
            <table class="table table-bordered">
                <tr class="info">
                    <th>#</th>
                    <th>Subject</th>
                    <th>Class</th>
                </tr>

                @php
                $count = 1;
                @endphp

                @foreach ($subjects as $subject)
                <tr>
                    <td> {{$count++}} </td>
                    <td> {{$subject->subject}} </td>
                    <td> {{ $subject->schoolClass->name }} </td>
                </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>

@endsection
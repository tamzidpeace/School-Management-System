@extends('layouts.admin_layout')

@section('content')

<div class="container">
    <div class="row">
        {{-- syllabus upload form --}}
        <div class="col-md-8">
            <h3>Upload Syllabus</h3>
            <hr>
            <form class="form-inline" method="post" action="/admin/class/syllabus" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="year">Class</label>

                    <select name="class" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected>Select Class</option>

                        <?php foreach ($classes as $class) { ?>
                        <option value=" {{ $class->id }} "> {{ $class->name }} </option>
                        <?php } ?>

                    </select>

                    <label for="year">Year</label>
                    {{-- <input name="year" type="year" class="form-control" placeholder="Enter Year"> --}}
                    <select name="year" class="custom-select mr-sm-2" id="inlineFormCustomSelecty">
                        <option selected>Select Year</option>
                        <?php for ($i=date('Y'); $i >=2015 ; $i--) { ?>
                        <option value="{{ $i }}">{{ $i }} </option>
                        <?php } ?>
                    </select>
                </div>
                <hr>
                <div class="form-group">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Select Syllabus File</label>
                        <input type="file" name="syllabus" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

        </div>
        <br>
        {{-- end of syllabus upload form --}}

        {{-- show list of syllabus --}}
        <div class="col-md-10">
            <h3>All Syllabuses</h3>
            <table class="table table-bordered">
                <tr class="info">
                    <th>#</th>
                    <th>Class</th>
                    <th>Year</th>
                    <th>Download</th>
                </tr>

                @php
                $count = 1;
                @endphp

                @foreach ($syllabuses as $syllabus)
                <tr>
                    <td> {{$count++}} </td>
                    <td> {{$syllabus->schoolClass->name}} </td>
                    <td> {{ $syllabus->year }} </td>
                    <td>
                        <a href="/admin/syllabus/download/{{$syllabus->id}} " class="btn btn-primary">Download</a>
                    </td>
                </tr>
                @endforeach

            </table>

        </div>
    </div>
</div>

@endsection
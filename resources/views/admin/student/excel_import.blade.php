@extends('layouts.admin_layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <p>Download Sample ExcelSheet Format</p>
            <a href="/admin/excel-download" type="button" >
                <button type="button" class="btn btn-primary"> Download </button>
            </a>
        </div>
    </div>
</div>

{!! Form::open( ['method' => 'POST', 'action' => 'AdminController@excelImportSave', 'files'=> true]) !!}

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::label('excel', 'Import') !!}
    {!! Form::file('excel', null, ['class' => 'form-control']) !!}
</div>

<div style="margin-top:15px; margin-bottom:15px;" class="form-group">
    {!! Form::submit('Import', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

@endsection
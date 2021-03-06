@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="#" class="btn btn-success">Import</a>   <span>** bulk import using csv <a href="#">click here</a> for csv format</span>
            </div>
        </div>
        <div class="row" style="padding: 10px;">

        </div>
        <div class="row">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            {{ Form::open(array('url' => 'school')) }}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill out form below to add new school.</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                {{ Form::label('name', 'Name' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('name', Input::old('name'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('street1', 'Street 1' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('street1', Input::old('street1'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('street2', 'Street 2' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('street2', Input::old('street2'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('city', 'City' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('city', Input::old('city'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('state', 'State' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('state', Input::old('state'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('zip', 'Zip' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('zip', Input::old('zip'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('zip_ext', 'Zip ext' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('zip_ext', Input::old('zip_ext'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('admin', 'Admin Email' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('admin', Input::old('admin'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('category', 'Category' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('category', Input::old('category'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::submit('Create', array('class' => 'btn btn-primary')) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                {{ Form::close() }}
        </div>

    </div>
@endsection
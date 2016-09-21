@extends('layouts.app')

@section('content')
    <div class="container">

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
            {{ Form::open(array('url' => 'offer')) }}
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Fill out form below to add new school.</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group row">
                                {{ Form::label('title', 'Title' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('title', Input::old('title'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('desc', 'Description' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('desc', Input::old('desc'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('header', 'Header' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('header', Input::old('header'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('trailer', 'Trailer' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('trailer', Input::old('trailer'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('desc_image', 'Disc Image' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::file('desc_image', Input::old('desc_image'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('logo', 'Logo' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::file('logo', Input::old('logo'), ['class' => 'form-control'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('expire_date', 'Expire Date' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('expire_date', Input::old('expire_date'), ['class' => 'form-control datepicker'])}}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('version', 'Version' ,  ['class' => 'col-xs-2 form-label'])}}
                                <div class="col-xs-10">
                                    {{ Form::text('version', Input::old('version'), ['class' => 'form-control'])}}
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
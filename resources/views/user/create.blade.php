@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="#" class="btn btn-success">Import</a>   <span>** bulk import using csv <a href="#">click here</a> for csv format</span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new subuser and permission</div>
                <div class="panel-body">
                    New user and permission form
                </div>
                <div class="panel-footer">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <a class="btn btn-primary" type="button" id="submitNewSchoolForm">Submit</a>

                            <a class="btn btn-danger" id="resetForm">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
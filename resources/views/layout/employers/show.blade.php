@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Employer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('layout.employers.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Firstname:</strong>
                <td>{{ $employer->firstname }}</td> </br>
                <strong>Lastname:</strong>
                <td>{{ $employer->lastname }}</td> </br>
                <strong>Job:</strong>
                <td>{{ $employer->job }}</td> </br>
                <strong>Workshop:</strong>
                <td>{{ $employer->workshop->name }}</td> </br>
                <strong>Sale:</strong>
                <td>{{ $employer->sale }} <span>%</span> </td>
            </div>
        </div>

    </div>
@endsection
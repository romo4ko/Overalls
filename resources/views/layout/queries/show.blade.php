@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Receiving</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('receiving.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employer:</strong>
                <td>{{ $receiving->employer->firstname }} {{ $receiving->employer->lastname }}</td> </br>
                <strong>Overall:</strong>
                <td>{{ $receiving->overall->type }}</td> </br>
                <strong>Datetime:</strong>
                <td>{{ $receiving->date }}</td> </br>
            </div>
        </div>

    </div>
@endsection
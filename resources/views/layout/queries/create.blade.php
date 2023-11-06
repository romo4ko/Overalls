@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12 m2">
        <div class="pull-left mb-2">
            <h2>Add New Receiving</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('receiving.index') }}">Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('receiving.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Employer:</strong>
                <select class="form-select" name="employer_id" aria-label="">
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}">{{ $employer->firstname }} {{ $employer->lastname }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Overall:</strong>
                <select class="form-select" name="overall_id" aria-label="">
                    @foreach ($overalls as $overall)
                        <option value="{{ $overall->id }}">{{ $overall->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
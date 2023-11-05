@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12 m2">
        <div class="pull-left mb-2">
            <h2>Add New Employer</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('employers.index') }}">Back</a>
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

<form action="{{ route('employers.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Firstname:</strong>
                <input type="text" name="firstname" class="form-control mt-2" placeholder="Firstname">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Lastname:</strong>
                <input type="text" name="lastname" class="form-control mt-2" placeholder="Lastname">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Job:</strong>
                <input type="text" name="job" class="form-control mt-2" placeholder="Job">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Workshop:</strong>
                <select class="form-select" name="workshop_id" aria-label="">
                    @foreach ($workshops as $workshop)
                        <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Sale:</strong>
                <input type="number" name="sale" class="form-control mt-2" placeholder="Sale">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
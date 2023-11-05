@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12 m2">
        <div class="pull-left mb-2">
            <h2>Add New Overall</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('layout.overalls.index') }}">Back</a>
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

<form action="{{ route('layout.overalls.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Type:</strong>
                <input type="text" name="type" class="form-control mt-2" placeholder="Type">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Term:</strong>
                <input type="date" name="term" class="form-control mt-2" placeholder="Term">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Cost:</strong>
                <div class="form-group input-group">
                    <span class="input-group-text mt-2">₽</span>
                    <input type="number" step="0.01" name="cost" class="form-control mt-2" placeholder="Cost">
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
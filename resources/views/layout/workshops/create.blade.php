@extends('layout.app')
@section('content')

<div class="row">
    <div class="col-lg-12 m2">
        <div class="pull-left mb-2">
            <h2>Add New Workshop</h2>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-primary" href="{{ route('workshops.index') }}">Back</a>
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

<form action="{{ route('workshops.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong class="mt-2">Name:</strong>
                <input type="text" name="name" class="form-control mt-2" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
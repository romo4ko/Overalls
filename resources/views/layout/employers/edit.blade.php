@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('layout.employers.index') }}">Back</a>
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

    <form action="{{ route('layout.employers.update',$employer->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Firstname:</strong>
                <input type="text" name="firstname" value="{{ $employer->firstname }}" class="form-control mt-2" placeholder="Firstname">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Lastname:</strong>
                <input type="text" name="lastname" value="{{ $employer->lastname }}" class="form-control mt-2" placeholder="Lastname">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Job:</strong>
                <input type="text" name="job" value="{{ $employer->job }}" class="form-control mt-2" placeholder="Job">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Workshop:</strong>
                <select class="form-select" name="workshop_id" aria-label="">
                    @foreach ($workshops as $workshop)
                        @if ($employer->workshop_id == $workshop->id)
                            <option selected value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                        @else
                            <option value="{{ $workshop->id }}">{{ $workshop->name }}</option>
                        @endif    
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Sale:</strong>
                <input type="number" name="sale" value="{{ $employer->sale }}" class="form-control mt-2" placeholder="Sale">
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
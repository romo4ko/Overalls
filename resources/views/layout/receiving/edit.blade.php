@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Receiving</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('receiving.index') }}">Back</a>
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

    <form action="{{ route('receiving.update',$receiving->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Employer:</strong>
                <select class="form-select" name="employer_id" aria-label="">
                    @foreach ($employers as $employer)
                        @if ($employer->id == $receiving->employer_id)
                            <option selected value="{{ $employer->id }}">{{ $employer->firstname }} {{ $employer->lastname }}</option>
                        @else
                            <option value="{{ $employer->id }}">{{ $employer->firstname }} {{ $employer->lastname }}</option>
                        @endif    
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong class="mt-2">Overall:</strong>
                <select class="form-select" name="overall_id" aria-label="">
                    @foreach ($overalls as $overall)
                        @if ($overall->id == $receiving->overall_id)
                            <option selected value="{{ $overall->id }}">{{ $overall->type }}</option>
                        @else
                            <option value="{{ $overall->id }}">{{ $overall->type }}</option>
                        @endif   
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
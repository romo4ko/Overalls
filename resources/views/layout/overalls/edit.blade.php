@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Overall</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary mb-2" href="{{ route('overalls.index') }}">Back</a>
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

    <form action="{{ route('overalls.update',$overall->id) }}" method="POST">
        @csrf

        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong class="mt-2">Type:</strong>
                    <input type="text" name="type" value="{{ $overall->type }}" class="form-control mt-2" placeholder="Type">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong class="mt-2">Term:</strong>
                    <input type="date" name="term" value="{{ $overall->term }}" class="form-control mt-2" placeholder="Term">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <strong>Cost:</strong>
                <div class="form-group input-group">
                    <span class="input-group-text mt-2">₽</span>
                    <input type="number" step="0.01" name="cost" value="{{ $overall->cost }}" class="form-control mt-2" placeholder="Cost">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
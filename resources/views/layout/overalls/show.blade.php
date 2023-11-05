@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Overall</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('overalls.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Type:</strong>
                {{ $overall->type }} </br>
                <strong>Term:</strong>
                {{ $overall->term }} </br>
                <strong>Cost:</strong>
                {{ $overall->cost }} <span>₽</span>
            </div>
        </div>

    </div>
@endsection
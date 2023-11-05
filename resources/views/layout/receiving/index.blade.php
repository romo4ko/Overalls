@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('receiving.create') }}">Create Receiving</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Employer</th>
            <th>Overall</th>
            <th>Datetime</th>
        </tr>
        @foreach ($receiving as $record)
        <tr>
            <td>{{ $record->employer->firstname }} {{ $record->employer->lastname }}</td>
            <td>{{ $record->overall->type }}</td>
            <td>{{ $record->created_at }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" href="{{ route('receiving.show',$record->id) }}">Show</a>
                <!-- <a class="btn btn-primary" href="{{ route('receiving.edit',$record->id) }}">Edit</a> -->
                <form action="{{ route('receiving.destroy',$record->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
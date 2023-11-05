@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('workshops.create') }}">Create Workshop</a>
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
            <th>Name</th>
        </tr>
        @foreach ($workshops as $workshop)
        <tr>
            <td>{{ $workshop->name }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" href="{{ route('workshops.show',$workshop->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('workshops.edit',$workshop->id) }}">Edit</a>
                <form action="{{ route('workshops.destroy',$workshop->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
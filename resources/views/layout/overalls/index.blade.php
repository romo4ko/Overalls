@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('overalls.create') }}">Create Overall</a>
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
            <th>Type</th>
            <th>Term</th>
            <th>Cost</th>
        </tr>
        @foreach ($overalls as $overall)
        <tr>
            <td>{{ $overall->type }}</td>
            <td>{{ $overall->term }}</td>
            <td>{{ $overall->cost }} <span>₽</span> </td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" href="{{ route('overalls.show',$overall->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('overalls.edit',$overall->id) }}">Edit</a>
                <form action="{{ route('overalls.destroy',$overall->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
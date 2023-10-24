@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('workshops.create') }}"> Create Workshop</a>
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
            <th>Title</th>
        </tr>
        @foreach ($workshops as $workshop)
        <tr>
            <td>{{ $workshops->name }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('layout.workshops.show',$workshops->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('layout.workshops.edit',$workshops->id) }}">Edit</a>
                <form action="{{ route('layout.workshops.destroy',$workshops->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
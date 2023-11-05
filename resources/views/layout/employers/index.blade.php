@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 m-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('layout.employers.create') }}">Create Employer</a>
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
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Job</th>
            <th>Workshop</th>
            <th>Sale</th>
        </tr>
        @foreach ($employers as $employer)
        <tr>
            <td>{{ $employer->firstname }}</td>
            <td>{{ $employer->lastname }}</td>
            <td>{{ $employer->job }}</td>
            <td>{{ $employer->workshop->name }}</td>
            <td>{{ $employer->sale }} <span>%</span> </td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" href="{{ route('layout.employers.show',$employer->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('layout.employers.edit',$employer->id) }}">Edit</a>
                <form action="{{ route('layout.employers.destroy',$employer->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
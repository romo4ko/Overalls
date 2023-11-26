@extends('layout.app')
@section('content')

    <div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        This app is being developed by Roman Korchnev to manage the issuance of workwear in production.
    </div>

@endsection
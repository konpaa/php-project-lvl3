@extends("layouts.app");

@section('content')
    <div class="jumbotron text-center">
        <h1>Page Analyzer</h1>
        <p>Check web pages for free</p>
        @include('domains.create')
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

        </div>
@endsection

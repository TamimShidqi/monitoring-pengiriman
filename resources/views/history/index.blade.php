@extends('layout.index')

@section('content')
    <div class="container">
        <h2>Based on delivery</h2>
        <ul>
            @foreach($history as $data)
                <li>{{ $data }}</li>
            @endforeach
        </ul>
    </div>
@endsection

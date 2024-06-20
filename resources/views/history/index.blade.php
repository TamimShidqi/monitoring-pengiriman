@extends('layout.index')

@section('content')
    <div class="container">
        <h1>History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through the history records and display them --}}
                @foreach ($history as $record)
                    <tr>
                        <td>{{ $record->date }}</td>
                        <td>{{ $record->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

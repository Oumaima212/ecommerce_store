@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mt-4 rounded max-w-2xl mx-auto">
            {{ session('success') }}
        </div>
    @endif

@endsection

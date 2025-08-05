@extends('layouts.app')

@section('content')

@livewire('product-list', ['showPagination' => true])

@endsection

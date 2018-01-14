{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css" />
@endsection

@section('content')
    <p>Welcome to this beautiful admin panel.</p>

    @include('partials.search')
    @include('partials.user-online')
@stop

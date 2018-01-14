@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @IsNotNull($domain)
            <h4>Your domain is {{$domain}}.</h4>
            @endIsNotNull
        </div>
    </div>
@endsection

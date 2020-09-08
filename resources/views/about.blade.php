@extends('layout/main')

@section('title', 'About')

@section('container')
    <div class="container">
        <div class="class">
            <div class="row">
                <h1 class="mt-2">Hello, {{ $nama }}!!</h1>
            </div>
        </div>
    </div>
@endsection
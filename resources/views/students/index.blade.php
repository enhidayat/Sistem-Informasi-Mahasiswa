@extends('layout/main')

@section('title', 'Students')

@section('container')
<div class="container">
        <div class="row">
            <div class="col-6">
                <h1 class="mt-3">List of Students</h1>
                {{-- //flashmessage --}}
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <ul class="list-group">
                    @foreach($students as $std)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{$std->nama}}
                        <a href="/students/{{ $std->id }}" class="badge badge-info">detail</a>
                    </li>
                    @endforeach
                </ul>
                
            </div>
        </div>
</div>
@endsection
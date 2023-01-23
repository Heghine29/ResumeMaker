@extends('components.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-column greeting max-w-6xl sm:px-6">
        <h1 class="text-center">Welcome{{auth()->check()?', '. auth()->user()->name : ''}}!</h1>
        <h2 class="text-center">We offer an easy way to create your resume</h2>
        @auth
            <p class="mt-3">
                <a class="btn btn-sm btn-outline-primary" href="/resume/create">Create Resume</a></p> <p class="mt-3">
        @else
            <p class="mt-3">
                <a class="btn btn-link text-success" href="/register">Register</a> or <a
                    class="btn btn-link text-success" href="/login">Login</a> to start creating </p>
        @endauth
    </div>
@endsection


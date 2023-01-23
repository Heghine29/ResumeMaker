@extends('components.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-column greeting max-w-6xl sm:px-6">
        <h1 class="text-center">Register</h1>
        <form class="form d-flex flex-column" method="post" action="/register">
            @csrf
            <label class="mt-2" for="name">Name</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" required class="form-control">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <label class="mt-2" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required
                   class="form-control">
            @error('email')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <label class="mt-2" for="password">Password</label>
            <input type="password" name="password" id="password" required
                   class="form-control">
            @error('password')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <input class="submit-button btn btn-primary mt-3" type="submit" value="Sign Up">
        </form>

    </div>
@endsection

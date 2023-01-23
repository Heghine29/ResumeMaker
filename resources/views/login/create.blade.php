@extends('components.layout')

@section('content')
    <div class="d-flex align-items-center justify-content-center flex-column greeting max-w-6xl sm:px-6">
        <h1 class="text-center">Login</h1>
        <form class="form d-flex flex-column" method="post" action="/login">
            @csrf

            <label class="mt-2" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required
                   class="form-control">

            <label class="mt-2" for="password">Password</label>
            <input type="password" name="password" id="password" required
                   class="form-control">
            @error('error')
            <p class="text-danger">{{$message}}</p>
            @enderror

            <input class="submit-button btn btn-primary mt-3" type="submit" value="Login">
        </form>

    </div>
@endsection

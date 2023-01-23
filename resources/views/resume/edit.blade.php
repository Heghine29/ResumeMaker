@extends('components.layout')

@section('content')
    <x-setting heading="Create Resume">
        <form method="POST" action="/resume/{{$resume->id}}" enctype="multipart/form-data" class="form">
            @csrf
            @method('PATCH')

            <label class="mt-2 d-block" for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{old('first_name', $resume->first_name)}}" required class="form-control">
            @error('first_name')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{old('last_name', $resume->last_name)}}" required class="form-control">
            @error('last_name')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="thumbnail">Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" class="d-block" required>
            @error('thumbnail')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="profession">Profession</label>
            <input type="text" name="profession" id="profession" value="{{old('profession', $resume->profession)}}" required class="form-control">
            @error('profession')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="education">Education</label>
            <textarea name="education" id="education" required class="form-control">{{old('education', $resume->education)}}</textarea>
            @error('education')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="work_history">Work History</label>
            <textarea rows="6" name="work_history" id="work_history" required class="form-control">{{old('work_history', $resume->work_history)}}</textarea>
            @error('work_history')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email', $resume->email)}}" required class="form-control">
            @error('email')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="address">Address</label>
            <input type="text" name="address" id="address" value="{{old('address', $resume->address)}}" required class="form-control">
            @error('address')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{old('phone', $resume->phone)}}" required class="form-control">
            @error('phone')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <label class="mt-2 d-block" for="phone">Add short title for your resume</label>
            <input type="text" name="slug" id="slug" value="{{old('slug', ucfirst($resume->str_slug))}}" required class="form-control">
            @error('slug')
            <span class=" text-danger  mt-0">{{$message}}</span>
            @enderror

            <input type="submit" class="submit-button btn btn-primary mt-3 d-block" value="Update">
        </form>
    </x-setting>
@endsection

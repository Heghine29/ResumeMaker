@extends('components.layout')

@section('content')
    <x-setting heading="Create Resume">
        <form id="createResumeForm" enctype="multipart/form-data" class="form">
            @csrf

            <label class="mt-2 d-block" for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" required class="form-control">
            <span id="error_first_name" class="errors text-danger   d-none  mt-0"></span>

            <label class="mt-2 d-block" for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" required class="form-control">
            <span id="error_last_name" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="thumbnail">Thumbnail</label>
            <input type="file" id="thumbnail" name="thumbnail" class="d-block" required>
            <span id="error_thumbnail" class="errors text-danger   d-none  mt-0"></span>

            <label class="mt-2 d-block" for="profession">Profession</label>
            <input type="text" name="profession" id="profession" value="{{old('profession')}}" required class="form-control">
            <span id="error_profession" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="education">Education</label>
            <textarea name="education" id="education" required class="form-control">{{old('education')}}</textarea>
            <span id="error_education" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="work_history">Work History</label>
            <textarea rows="6"  name="work_history" id="work_history" required class="form-control">{{old('work_history')}}</textarea>
            <span id="error_work_history" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}" required
                   class="form-control">
            <span id="error_email" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="address">Address</label>
            <input type="text" name="address" id="address" value="{{old('address')}}" required class="form-control">
            <span id="error_address" class="errors text-danger   d-none  mt-0"></span>


            <label class="mt-2 d-block" for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{old('phone')}}" required class="form-control">
            <span id="error_phone" class="errors text-danger   d-none  mt-0"></span>

            <label class="mt-2 d-block" for="phone">Name your resume for further changes</label>
            <input type="text" name="slug" id="slug" value="{{old('slug')}}" required class="form-control">
            <span id="error_slug" class="errors text-danger d-none  mt-0"></span>

            <input id="createResume" type="submit" class="submit-button btn btn-primary mt-3 d-block" value="Create">
        </form>
    </x-setting>
@endsection

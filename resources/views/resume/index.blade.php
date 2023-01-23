@extends('components.layout')

@section('content')
    <x-setting heading="Create Resume">
        @if($resumes->isEmpty())
            <p class="text-secondary text-center">You have not created any resume yet</p>
        @endif
        <table class="resume_table table table-striped table-bordered">
            @foreach($resumes as $resume)
            <tr>
                <td><a class="btn p-0" href="/resume/{{$resume->slug}}">{{$resume->str_slug}}</a> <img class="sm_img" src="{{asset('storage/'.$resume->thumbnail)}}"></td>
                <td class="sm_td"><a class="text-success" href="/resume/{{$resume->id}}/edit">Edit</a></td>
                <td class="sm_td">
                    <form method="post" action="/resume/{{$resume->id}}">
                        @csrf
                        @method('delete')
                        <button class="btn p-0 m-0 text-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </x-setting>
@endsection

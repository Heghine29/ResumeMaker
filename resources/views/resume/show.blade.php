@extends('components.layout')

@section('content')
    <x-setting heading="Resume">
        <div id="resume">
            <div class="d-flex w-100">
                <div class="left flex-shrink-0">
                    <div class="general">
                        <div style="background-image: url('{{asset('storage/'.$resume->thumbnail)}}')"
                             class="avatar"></div>
                        <h4>{!! $resume->first_name. '<br>' .$resume->last_name !!}</h4>
                        <h5>{{$resume->profession}}</h5>
                    </div>
                    <p class="sect_left m-0">Contacts</p>
                    <div class="contacts">
                        <div>
                            <p class="fw-bold m-0 lh-1">Address</p>
                            <p class=" lh-1">{{$resume->address}}</p>
                        </div>
                        <div>
                            <p class="fw-bold m-0 lh-1">Email</p>
                            <p class=" lh-1">{{$resume->email}}</p>
                        </div>
                        <div>
                            <p class="fw-bold m-0 lh-1">Phone</p>
                            <p class=" lh-1">{{$resume->phone}}</p>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div>
                        <p class="sect_right">Work History</p>
                        <p class="big_text">{{$resume->work_history}}</p>
                    </div>
                    <div>
                        <p class="sect_right">Education</p>
                        <p class="big_text">{{$resume->education}}</p>
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:demoFromHTML()" class="download btn btn-success">DownLoad PDF</a>
    </x-setting>
@endsection

@extends('layouts.app')

@section('content')

    <div class="project-wrapper">
        <div class="project-hero-img">
            <div class="overlay">

            </div>
            <img src="{{$project->foto}}" alt="">
        </div>

        <div class="">
            <h1>{{$project->naam}}</h1>
        </div>
    </div>


@endsection

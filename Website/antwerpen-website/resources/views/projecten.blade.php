@extends('layouts.app')


@section('content')

<div>
    <p>testlalalala</p>
</div>

<ul id="project-container">
@foreach ($projecten as $project)

    <li class="titles-wrap animated project-box">
       <img src=" {{$project->foto}}" alt="">
        <article>
            <time> {{ $project->created_at }} </time>
            <h1>
                <a href="project/{{$project->idProject}}">{{ $project->naam }}</a>
            </h1>
            <p>{{ str_limit($project->uitleg, $limit = 250, $end='...')  }}</p>
            <div>
                <a href="project/{{$project->idProject}}">meer lezen</a>
            </div>
        </article>
    </li>
            
@endforeach
</ul>

@endsection
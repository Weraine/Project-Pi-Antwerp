@extends('layouts.app')


@section('content')

<div>
    <p>testlalalala</p>
</div>

<div class="grid">
    <div class="grid-sizer"></div>
    <div class="gutter-sizer"></div>

    @foreach ($projecten as $project)

        <div class="project-box">
           <img src=" {{$project->foto}}" alt="">
            <article>
                <time> {{ $project->created_at }} </time>
                <h1>
                    <a href="">{{ $project->naam }}</a>
                </h1>
                <p>{{ str_limit($project->uitleg, $limit = 250, $end='...')  }}</p>
                <div>
                    <a href="">meer lezen</a>
                </div>
            </article>
        </div>

    @endforeach

</div>

@endsection

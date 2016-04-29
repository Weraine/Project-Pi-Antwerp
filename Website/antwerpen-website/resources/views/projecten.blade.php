@extends('layouts.app')


@section('content')


<!--<div class="carousel">
    <div>
        <img src="/pictures/testafb.jpeg" alt="test" />
        <div class="overlay">
            <a href="#"><h1>Project: 1</h1></a>
        </div>
    </div>
    <div>
        <img src="/pictures/testafb2.jpeg" alt="test" />
        <div class="overlay">
            <a href="#"><h1>Project: 2</h1></a>
        </div>
    </div>
    <div>
        <img src="/pictures/testafb3.jpeg" alt="test" />
        <div class="overlay">
            <a href="#"><h1>Project: 3</h1></a>
        </div>
    </div>
    <div>
        <img src="/pictures/testafb4.jpeg" alt="test" />
        <div class="overlay">
            <a href="#"><h1>Project: 4</h1></a>
        </div>
    </div>
</div>-->




<div class="grid">
    @foreach ($projecten as $project)

        <div class="project-box">
           <a href="project/{{$project->idProject}}"><img src="{{$project->foto}}" alt=""></a>
            <article>
                <time> {{ $project->created_at }} </time>
                <h5>
                    <a href="project/{{$project->idProject}}">{{ $project->naam }}</a>
                </h5>
                <p>{{ str_limit($project->uitleg, $limit = 250, $end='...')  }}</p>
                <div>
                    <a class="meerlezen" href="project/{{$project->idProject}}"> meer lezen</a>
                </div>
            </article>
            <div class="project-box-footer">
                @if (!Auth::guest() && Auth::user()->role == 10)
                    <a href="admin/project-bewerken/{{$project->idProject}}" class="bewerken-link">Bewerken</a>
                @endif
                
                <a href="#" class="footer-link">Test Categorie</a>
            </div>
        </div>

    @endforeach

</div>

@endsection

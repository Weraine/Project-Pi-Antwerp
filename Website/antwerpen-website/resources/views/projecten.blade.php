@extends('layouts.app')


@section('content')


<div id="grid" data-columns>
    @foreach ($projecten as $project)
    <div class="thumbnail project-box">
       <a href="project/{{$project->idProject}}"><img src="{{$project->foto}}" alt=""></a>
        <article>
            <time>
                {{ date('d F, Y', strtotime($project->created_at)) }}
            </time>
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
                <a href="admin/project-bewerken/{{$project->idProject}}" class="bewerken-link"><i class="fa fa-pencil-square-o"></i>Bewerken</a>
            @endif
            <a href="#" class="footer-link">Test Categorie</a>
        </div>
    </div>
    @endforeach
</div>
@endsection

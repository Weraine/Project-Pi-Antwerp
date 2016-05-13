@extends('layouts.app')


@section('content')

<div class="col-md-12 col-xs-12 col-sm-12 filter">
    <!-- Single button -->
    <div class="btn-group" id="filter-cat-btn">
        <button name="filter" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-filter"></i>Categorie filter   <span class="caret"></span>
        </button>

        <ul class="dropdown-menu">
            @foreach($categories as $categorie)
                <!-- TO DO: ADD FILTER METHODE AAN BUTTON CLICK -->
                <li><a href="/{{$categorie->idCategorie}}/NULL"> {{$categorie->naam}} </a></li>
            @endforeach
        </ul>
    </div>

    <div class="btn-group" id="filter--btn">
        <button name="filter" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-map-marker"></i>Locatie filter   <span class="caret"></span>
        </button>

        <ul class="dropdown-menu">
            @foreach($locaties as $locatie)
                <!-- TO DO: ADD FILTER METHODE AAN BUTTON CLICK -->
                <li><a href="#"> {{$locatie->locatie}} </a></li>
            @endforeach
        </ul>
    </div>
</div>


<div id="grid" data-columns>
    @foreach ($projecten as $project)
    <div class="thumbnail project-box">
        <a href="project/{{$project->idProject}}"><img src="{{$project->foto}}" alt=""></a>
        <div class="location">
            <h5>
                <a href="project/{{$project->idProject}}">{{ $project->naam }}</a>
            </h5>
            <a href='#'>
                <i class="fa fa-map-marker"></i> {{ $project->locatie }}
            </a>
        </div>
        <article>

            <time>
                {{ date('d F, Y', strtotime($project->created_at)) }}
            </time>
            <p>{{ str_limit($project->uitleg, $limit = 250, $end='...')  }}</p>
            <div>
                <a class="meerlezen" href="project/{{$project->idProject}}"><i class="fa fa-plus meerlezen_plus"></i> meer lezen</a>
            </div>
        </article>
        <div class="project-box-footer">
            @if (!Auth::guest() && Auth::user()->role == 10)
                <a href="admin/project-bewerken/{{$project->idProject}}" class="bewerken-link"><i class="fa fa-pencil-square-o"></i>Bewerken</a>
            @endif
                <a href="#" class="footer-link">
                    <i class="{{$project->icon_class}}"></i> {{$project->catNaam}}
                </a>
        </div>
    </div>
    @endforeach
</div>
@endsection

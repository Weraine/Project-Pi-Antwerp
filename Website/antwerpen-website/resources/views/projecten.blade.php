@extends('layouts.app')


@section('content')

<div class="col-md-12 col-xs-12 col-sm-12 filter">
    <!-- Single button -->
    <div class="btn-group" id="filter-btn">
        <button name="filter" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-filter"></i>Filter   <span class="caret"></span>
        </button>

        <ul class="dropdown-menu">
            @foreach($categories as $categorie)
                <!-- TO DO: ADD FILTER METHODE AAN BUTTON CLICK -->
                <li><a href="#"> {{$categorie->naam}} </a></li>
            @endforeach
        </ul>
    </div>
</div>


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
                <a href="#" class="footer-link">
                    <i class="{{$project->icon_class}}"></i> {{$project->catNaam}}
                </a>
        </div>
    </div>
    @endforeach
</div>
@endsection

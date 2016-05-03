@extends('layouts.app')

@section('content')

    <div class="project-wrapper">
        <div class="project-big-box">
            <div class="project-hero-img">
                <img src="{{$project->foto}}" alt="">
            </div>
            <article class="">
                <h1>{{$project->naam}}</h1>
                <time> {{ $project->created_at }} </time>
                <p>
                    {{$project->uitleg}}
                </p>
            </article>
        </div>
    </div>


    <section id="cd-timeline" class="cd-container">
        @foreach($phases as $phase)
        	<div class="cd-timeline-block">
        		<div class="cd-timeline-img cd-{{$phase->status}}">
                    <span>#{{$phase->faseNummer}}</span>
        		</div> <!-- cd-timeline-img -->

        		<div class="cd-timeline-content" data-id="{{$phase->idFase}}">
        			<h5>{{$phase->title}}</h5>
        			<p>{{$phase->uitleg}}</p>
        			<a href="#0" class="cd-read-more" data-id="{{$phase->idFase}}">Lees meer</a>
        			<span class="cd-date"></span>
                    {{ Form::open(array(
                      'url' => '/project/' . $project->idProject,
                      'class' => 'form-horizontal',
                      'role' => 'form',
                      'files' => true)) }}
                        
                    {{ Form::close() }}
        		</div> <!-- cd-timeline-content -->
        	</div> <!-- cd-timeline-block -->
        @endforeach

	</section> <!-- cd-timeline -->


@endsection

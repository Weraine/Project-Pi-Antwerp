@extends('layouts.app')

@section('content')

    <div class="project-wrapper">
        <div class="project-big-box">
            <div class="project-hero-img">
                <img src="{{$project->foto}}" alt="">

            </div>

            <article>
                <p>
                    @foreach($categorien as $categorie)
                        @if($project->idCategorie == $categorie->idCategorie)
                            <i class="{{$categorie->icon_class}}"></i>{{$categorie->naam}}
                        @endif
                    @endforeach
                </p>
                <h1>{{$project->naam}}</h1>
                <time> {{ date('d F, Y', strtotime($project->created_at)) }} </time>
                <p>
                    {{$project->uitleg}}
                </p>
                @if(true)
                    <a href="#" id="following-btn" class="btn btn-success" disabled><i class="fa fa-check"></i>Aan het volgen</a>
                @else
                    <a href="#" id="follow-btn" class="btn btn-default"><i class="fa fa-plus"></i>Project volgen</a>
                @endif
            </article>
        </div>
    </div>


    <section id="cd-timeline" class="cd-container">
        @foreach($phases as $key => $phase)
        	<div class="cd-timeline-block">
        		<div class="cd-timeline-img cd-{{$phase->status}}">
                    <span>#{{$phase->faseNummer}}</span>
        		</div> <!-- cd-timeline-img -->

        		<div class="cd-timeline-content" data-id="{{$phase->idFase}}">
        			<h5>{{$phase->title}}</h5>
        			<p>{{$phase->uitleg}}</p>
        			<a href="#0" class="cd-read-more" data-id="{{$phase->idFase}}">Lees meer</a>
        			<span class="cd-date">{{ date('d F, Y', strtotime($phase->start_datum)) }}</span>

                    <div class="cd-timeline-question-form">
                        {{ Form::open(array(
                            'url' => '/project/' . $project->idProject,
                            'class' => 'form-horizontal',
                            'role' => 'form',
                            'files' => false)) }}

                                @foreach($questions as $key => $question)
                                    {{ Form::label('question', $question[0]->vraag, array(
                                        'class' => 'control-label')) }}

                                    {{ Form::text('naam', '', array(
                                      'class' => 'form-control')) }}
                                @endforeach

                        {{ Form::close() }}
                    </div>

        		</div> <!-- cd-timeline-content -->
        	</div> <!-- cd-timeline-block -->
        @endforeach

	</section> <!-- cd-timeline -->


@endsection

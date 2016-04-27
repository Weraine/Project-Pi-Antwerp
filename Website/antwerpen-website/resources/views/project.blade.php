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
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="/pictures/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<a href="#0" class="cd-read-more">Lees meer</a>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="/pictures/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<a href="#0" class="cd-read-more">Lees meer</a>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="/pictures/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="/pictures/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<a href="#0" class="cd-read-more">Lees meer</a>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="/pictures/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<a href="#0" class="cd-read-more">Lees meer</a>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="/pictures/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2></h2>
				<p></p>
				<span class="cd-date"></span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
	</section> <!-- cd-timeline -->


@endsection

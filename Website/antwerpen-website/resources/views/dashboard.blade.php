@extends('layouts.app')

@section('content')

<div class="container" id="dashboard">
    <h1>Profiel gegevens.</h1>

    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="panel panel-default profile-box">
            <img class="profile-picture-big center-block" src="/pictures/a-logo.svg" alt="" />
            <p>
                {{Auth::user()->name}}
            </p>
            <p>
                {{Auth::user()->email}}
            </p>
            <a href="#" class="btn btn-default center-block"><i class="fa fa-pencil-square-o"></i>Profiel bewerken</a>

        </div>
    </div>

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading profile-heading">
                <h3><i class="fa fa-bar-chart"></i>Profiel activiteit</h3>
            </div><!--panel-heading-->

            <div class="panel-body">
                <div class="media">

                    <div class="media-left media-top">
                        <a href="#">
                            <img class="media-object profile-picture-small" src="/pictures/a-logo.svg" alt="a-logo">
                        </a>
                    </div><!--media-left-->

                    <div class="media-body">
                        <h4 class="media-heading"><a href='#' id="project-link"><i class="fa fa-check"></i>Project 1: Lorum Ipsum</a></h4>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mauris justo, venenatis eu est nec, interdum fermentum ante. Maecenas facilisis mollis purus vel egestas. Nunc a dui dignissim orci pulvinar facilisis et et purus.
                        </p>
                    </div><!--media-body-->

                </div><!--media-->
            </div><!--panel-body-->
        </div><!--panel-->
    </div><!--col-md-9-->
</div><!--container-->

@endsection

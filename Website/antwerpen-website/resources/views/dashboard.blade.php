@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Profiel gegevens.</h1>

    <div class="col-md-3">
        <div class="panel panel-default profile-box">
            <img class="center-block" src="/pictures/a-logo.svg" alt="" />
            <p>
                {{Auth::user()->name}}
            </p>
        </div>
    </div>

    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">

            </div>
        </div>
    </div>


    <p><strong>Naam: </strong>{{ Auth::user()->name }}</p>
    <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
    <a href="#">Wachtwoord aanpassen (todo)</a>
</div>


@endsection

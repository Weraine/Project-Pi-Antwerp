@extends('layouts.app')

@section('content')

<div>
    <h1>Profiel gegevens.</h1>

    <p><strong>Naam: </strong>{{ Auth::user()->name }}</p>
    <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
    <a href="#">Wachtwoord aanpassen (todo)</a>
</div>


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Fases van project <ins>{{$project->naam}}</ins>:  aanpassen</h2>
                </div>
                <div class="panel-body">
                   @foreach($fases as $fase)
                    <div class="bs-callout bs-callout-primary"><h3>Fase {{$fase->faseNummer}}: {{$fase->title}}</h3>
                    <p>{{$fase->uitleg}}</p>
                    @if($fase->foto != null)
                    <img src="/pictures/uploads/{{$fase->foto}}" alt="">
                    @endif
                    <p>Status: <span class="{{$fase->status}}"><strong>{{$fase->status}}</strong></span></p>   
                    <a class="btn btn-primary" href="fases/{{$fase->faseNummer}}" role="button"><i class="fa fa-edit"></i>Fase bewerken</a>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

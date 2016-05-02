@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Project {{$project->idProject}} Bewerken</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url($urlpath) }}/">
                        {!! csrf_field() !!}

                        <!--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">-->
                        <div>
                            <label class="col-md-4 control-label" for="naam">Projectnaam</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="naam" name="naam" value="{{$project->naam}}">

                                <!--@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif-->
                            </div>
                        </div>
                        
                        <div>
                            <label class="col-md-4 control-label" for="uitleg">Uitleg</label>
                            <div class="col-md-6">            
                            <textarea name="uitleg" id="uitleg" cols="30" rows="10" value="">{{$project->uitleg}}</textarea>
                            </div>
                        </div>
                        
                        <div>
                            <label class="col-md-4 control-label" for="locatie">Locatie</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="locatie" name="locatie" value="{{$project->locatie}}">
                            </div>
                        </div>
                        
                        
                        <div>
                            <label class="col-md-4 control-label" for="foto">Foto
                            @if ($picpath != "")
                            : {{$picpath}}
                            @endif
                            </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="foto" name="foto" value="{{$project->foto}}">
                            </div>
                        </div>
                        
                        <div>
                            <label class="col-md-4 control-label" for="isActief">Is project actief?</label>
                            <div class="col-md-6">
                                {{Form::checkbox('isActief', '1', $isActief, ['id' => 'isActief'])}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Aanpassen
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

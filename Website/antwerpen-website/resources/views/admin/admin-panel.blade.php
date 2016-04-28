@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h1>Project toevoegen</h1></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/newproject') }}">
                        {!! csrf_field() !!}

                        <!--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">-->
                        <div>
                            <label class="col-md-4 control-label" for="naam">Projectnaam</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="naam" name="naam" value="{{ old('naam') }}">

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
                            <textarea name="uitleg" id="uitleg" cols="30" rows="10" value="{{ old('uitleg') }}"></textarea>
                            </div>
                        </div>
                        
                        <div>
                            <label class="col-md-4 control-label" for="locatie">Locatie</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="locatie" name="locatie" value="{{ old('locatie') }}">
                            </div>
                        </div>
                        
                        
                        <div>
                            <label class="col-md-4 control-label" for="foto">Foto</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" id="foto" name="foto" value="{{ old('foto') }}">
                            </div>
                        </div>
                        
                        <div>
                            <label class="col-md-4 control-label" for="isActief">Is project actief?</label>
                            <div class="col-md-6">
                                <input type="checkbox" class="form-control" id="isActief" name="isActief" value="{{ old('isActief') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i>Aanmaken
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

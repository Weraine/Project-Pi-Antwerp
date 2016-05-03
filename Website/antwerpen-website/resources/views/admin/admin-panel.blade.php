@extends('layouts.app')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">
        <h1>Admin panel</h1>
    </div>
    <div class="panel-body container">
        <div class="row">
            <div class="col-md-4">
                <div>
                    <a class="btn btn-success" href="/admin/nieuwproject"><i class="fa fa-plus"></i>Nieuw project toevoegen</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a class="btn btn-warning" href="/admin/nieuwproject"><i class="fa fa-pencil-square-o"></i>Project wijzigen</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <a class="btn btn-danger" href="/admin/nieuwproject"><i class="fa fa-trash-o"></i>Project verwijden</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

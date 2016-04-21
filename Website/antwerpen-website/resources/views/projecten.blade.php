@extends('layouts.app')


@section('content')

<div>
    <p>testlalalala</p>
</div>

<table>
@foreach ($projecten as $project)
    <tr>
        <!-- Project Name -->
        <td class="table-text">
            <div>{{ $project->naam }}</div>
        </td>

        <td>
            <!-- TODO: Delete Button -->
        </td>
    </tr>
@endforeach
</table>

@endsection
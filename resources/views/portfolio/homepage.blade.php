@extends('layouts.public')
@section('title', 'Home')

@section('content')
<div class="container">
    <h1>Benvenuto nel sito</h1>
    @foreach ( $projects as $project)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$project['titolo']}}</h5>
            <p class="card-text">{{$project['descrizione']}}</p>
            @if($project['link_git_hub'] != '')
                <a href="{{$project['link_git_hub']}}">Link git Hub</a>
            @endif
            
            {{-- <a href="/{{ $project['id'] }}">Maggiori informazioni</a> --}}
        </div>
    </div>
@endforeach
</div>


@endsection
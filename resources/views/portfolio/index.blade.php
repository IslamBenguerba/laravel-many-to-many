
@extends('layouts.public')
@section('title', 'Home')
@section('content')
@dump($projects)
@foreach ( $projects as $project)
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$project['titolo']}}</h5>
            <p class="card-text">{{$project['descrizione']}}</p>
            <a  href="{{route ('admin.portfolio.show', $project->id)}}"><i class="bi bi-eyeglasses"></i></a>
            <img src="{{asset('storage/' . $project->image)}}" alt="" style="width: 18rem">
            <a class="btn btn-success" href="{{ route('admin.portfolio.edit', $project->id) }}"> <i class="bi bi-pencil-square"></i>Edit</a>
            <i class="fa-solid fa-house" style="font-size: 3rem"></i>

        </div>
    </div>
@endforeach
@endsection

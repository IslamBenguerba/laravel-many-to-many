@extends('layouts.public')

@section('title', 'More info')

@section('content')
    <div class="container-card-show">
        <div class="card" style="height: 100%">
            <div class="card-titolo-show">
                <div>
                    <h2>{{ $project->titolo }}</h2>
                    {{-- se ha una categoria .... Fammmelo vedere  --}}
                    @if ($project->category)
                        {{ $project->category->categoria }}
                    @endif
                    {{-- contolla se c'è almeno un valore in technologies --}}
                    {{-- Ciclo per il numero di relazioni che ha il progetto con la tabella ponte --}}
                    {{-- $tech  sara l'intera relazione con la tabella technologia e facendo $tech->tecnologia vedremo il valore nella colonna technologia della tabellla technologies --}}
                    @if ($project->technologies)
                        @foreach ($project->technologies as $tech)
                            <span>{{ $tech->tecnologia }}</span>
                        @endforeach
                    @endif
                    
                </div>


                <a class="btn btn-success" href="{{ route('admin.portfolio.edit', $project->id) }}"> <i
                        class="bi bi-pencil-square"></i>Edit</a>
            </div>

            <div class="container-project-show">
                <img class="imng-hero-show" src="{{ asset('storage/' . $project->image) }}" alt="">
                <p class="text-show">{{ $project->descrizione }}</p>
            </div>
            <div class="container-button-show">
                <a href="{{ route('admin.home.index') }}">Torna alla Home</a>
                <form action="{{ route('admin.portfolio.destroy', $project->id) }}" method="POST">
                    @csrf

                    @method('DELETE')

                    <button class="btn btn-danger">Elimina</button>

                </form>
            </div>
        </div>
    </div>

@endsection

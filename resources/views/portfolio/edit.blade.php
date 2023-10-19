@extends('layouts.public')

@section('title', 'Modifica')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-6">

                <form action="{{ route('admin.portfolio.update', $project->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf()
                    @method('put')

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Titolo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('titolo') is-invalid @enderror"
                                value="{{ old('titolo', $project->titolo) }}" name="titolo">
                            @error('titolo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Descrizione</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('descrizione') is-invalid @enderror" style="height: 130px;" name="descrizione">{{ old('descrizione', $project->descrizione) }}</textarea>
                            @error('descrizione')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Thumb (URL)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('link_git_hub') is-invalid @enderror"
                                value="{{ old('link_git_hub', $project->link_git_hub) }}" name="link_git_hub">
                            @error('link_git_hub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Data ultimo commit</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('update_date') is-invalid @enderror"
                                {{-- metodo per modificare la data poichè l form si aspetta la data in questo formato --}}
                                value="{{ old('update_date', \Carbon\Carbon::parse($project->update_date)->format('Y-m-d')) }}"
                                name="update_date">
                            @error('update_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01" name="image">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                    </div>
                    @foreach ($categories as $categoria)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="categorie_id" value="{{ $categoria->id }}"
                                id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                {{ $categoria->categoria }}
                                @error('categorie_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </label>
                        </div>
                    @endforeach
                    <div>
                    Linguaggi
                    @foreach ($technologies as $technology)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{ $technology->id }}"
                                id="flexCheckDefault" name="techs[]">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $technology->tecnologia }}
                            </label>
                        </div>
                    @endforeach
                </div>
                    <div class="d-flex justify-content-between">
                        <a class="btn btn-secondary" href="{{ route('admin.home.index') }}">Annulla</a>
                        <button class="btn btn-primary">Salva</button>
                        {{-- <form action="{{ route('comic.destroy', $comic->id) }}" method="POST">
                            @csrf

                            @method('DELETE')

                            <button class="btn btn-danger">Elimina</button>
                        </form> --}}
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

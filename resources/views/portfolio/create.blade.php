@extends('layouts.public')

@section('title', 'Posta un fumetto')

@section('content')
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-6">
                <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf()

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Titolo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('titolo') is-invalid @enderror"
                                value="{{ old('titolo') }}" name="titolo">
                            @error('titolo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Descrizione</label>
                        <div class="col-sm-10">
                            <textarea class="form-control @error('descrizione') is-invalid @enderror" style="height: 140px;" name="descrizione">{{ old('descrizione') }}</textarea>
                            @error('descrizione')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('link_git_hub') is-invalid @enderror"
                                value="{{ old('link_git_hub') }}" name="link_git_hub">
                            @error('link_git_hub')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01" name="image">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="image">
                      </div>

                    <div class="text-center">
                        <a class="btn btn-secondary" href="\">annulla</a>
                        <button class="btn
                            btn-primary">Salva</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@endsection

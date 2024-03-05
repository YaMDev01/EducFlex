@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $serie->exists ? 'Edition de série':'Création de série' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($serie->exists ? 'serie.update':'serie.store', $serie) }}" method="POST">
            @csrf
            @method($serie->exists ? 'put':'post')
            
            <div class="mb-4">
                <label for="genre" class="form-label">{{ ('Genrer :') }}</label>
                <select name="genre" class="form-select @error('genre') is-invalid @enderror" id="genre">
                    <option value={{ $serie->genre ?? null }}>{{ $serie->exists ? ucfirst($serie->genre):'Choisissez une option' }}</option>
                    @if ($serie->exists)
                        <option value="{{ $serie->genre == 'litteraire' ? 'scientifique':'litteraire' }}">
                            {{ $serie->genre == 'litteraire' ? 'Scientifique':'Litteraire' }}
                        </option>
                    @else
                        <option value="litteraire">{{ __("Litteraire") }}</option>
                        <option value="scientifique">{{ __('Scientifique') }}</option>
                    @endif
                    
                </select>
                @error('genre')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="libelle" class="form-label">{{ ('Série :') }}</label>
                <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" id="libelle" value="{{ old('libelle', $serie->libelle) }}">
                @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-5 mx-2">

                @if ($serie->exists)
                    <span class="mx-5">
                        <input type="checkbox" name="seconde" class="form-checks" id="seconde" value="1" {{ $serie->seconde ? 'checked':null }}>
                        <label class="form-label" for="seconde">{{ __('Séconde') }}</label>
                    </span>

                    <span class="mx-5">
                        <input type="checkbox" name="premiere" class="form-checks" id="premiere" value="1" {{ $serie->premiere ? 'checked':null }}>
                        <label class="form-label" for="premiere">{{ __('Première') }}</label>
                    </span>

                    <span class="mx-5">
                        <input type="checkbox" name="terminale" class="form-checks" id="terminale" value="1" {{ $serie->terminale ? 'checked':null }}>
                        <label class="form-label" for="terminale">{{ __('Terminale') }}</label>
                    </span>
                    
                    <span class="mx-5">
                        <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $serie->actif ? 'checked':null }}>
                        <label class="form-label" for="actif">{{ __('Activation') }}</label>
                    </span>
                @else
                    <span class="mx-5">
                        <input type="checkbox" name="seconde" class="form-checks" id="seconde" value="1" checked>
                        <label class="form-label" for="seconde">{{ __('Séconde') }}</label>
                    </span>

                    <span class="mx-5">
                        <input type="checkbox" name="premiere" class="form-checks" id="premiere" value="1" checked>
                        <label class="form-label" for="premiere">{{ __('Première') }}</label>
                    </span>

                    <span class="mx-5">
                        <input type="checkbox" name="terminale" class="form-checks" id="terminale" value="1" checked>
                        <label class="form-label" for="terminale">{{ __('Terminale') }}</label>
                    </span>
                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $serie->exists ? 'secondary':'primary'}}">
                    {{ $serie->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $matiere->exists ? 'Edition de matiere':'Création de matiere' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($matiere->exists ? 'matiere.update':'matiere.store', $matiere) }}" method="POST">
            @csrf
            @method($matiere->exists ? 'put':'post')
            @php
                $selector = 'Choisie une option';
            @endphp
            <div class="mb-3">
                <label for="libelle" class="form-label">{{ ('Nom complete :') }}</label>
                <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" id="matiere" value="{{ old('libelle', $matiere->libelle) }}">
                @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="abrege" class="form-label">{{ ('Nom abrége :') }}</label>
                <input type="text" name="abrege" class="form-control" id="matiere" value="{{ old('abrege', $matiere->abrege) }}">
            </div>

            <div class="mb-4 mx-2">
                <span>
                    <input type="checkbox" name="cycle1" class="form-checks" id="cycle1" value="1" checked>
                    <label class="form-label mr-3" for="cycle1">{{ __('Cycle 1') }}</label>
                </span>

                <span class="mx-5">
                    <input type="checkbox" name="cycle2" class="form-checks" id="cycle2" value="1" checked>
                    <label class="form-label" for="cycle2">{{ __('Cycle 2') }}</label>
                </span>
                @if ($matiere->exists)
                <span class="mx-5">
                    <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $matiere->actif ? 'checked':null }}>
                    <label class="form-label" for="actif">{{ __('Activation') }}</label>
                </span>
                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $matiere->exists ? 'secondary':'primary'}}">
                    {{ $matiere->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

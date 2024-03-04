@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $nationalite->exists ? 'Edition de nationalité':'Création de nationalité' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($nationalite->exists ? 'nationalite.update':'nationalite.store', $nationalite) }}" method="POST">
            @csrf
            @method($nationalite->exists ? 'put':'post')
            @php
                $selector = 'Choisie une option';
            @endphp
            <div class="mb-4">
                <label for="libelle" class="form-label">{{ ('Libellé nationalite :') }}</label>
                <input type="text" name="libelle" class="form-control @error('libelle') is-invalid @enderror" id="libelle" value="{{ old('libelle', $nationalite->libelle) }}">
                @error('libelle')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if($nationalite->exists)
            <div class="mb-5 form-check">
                <input type="checkbox" name="actif" class="form-check-input" id="actif" value="1" {{ $nationalite->actif ? 'checked':null }}>
                <label class="form-check-label" for="actif">{{ __('Activation') }}</label>
            </div>
            @endif
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $nationalite->exists ? 'secondary':'primary'}}">
                    {{ $nationalite->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

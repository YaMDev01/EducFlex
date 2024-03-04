@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $coefficient->exists ? 'Edition de coefficient':'Création de coefficient' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($coefficient->exists ? 'coefficient.update':'coefficient.store', $coefficient) }}" method="POST">
            @csrf
            @method($coefficient->exists ? 'put':'post')
            @php
                $selector = 'Choisie une option';
            @endphp
            <div class="mb-3">
                <label for="valeur" class="form-label">{{ ('Valeur coefficient :') }}</label>
                <input type="number" name="valeur" class="form-control @error('valeur') is-invalid @enderror" id="coefficient" value="{{ old('valeur', $coefficient->valeur) }}">
                @error('valeur')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4 mx-2">
                @if ($coefficient->exists)
                    <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $coefficient->actif ? 'checked':null }}>
                    <label class="form-label" for="actif">{{ __('Activation') }}</label>

                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $coefficient->exists ? 'secondary':'primary'}}">
                    {{ $coefficient->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

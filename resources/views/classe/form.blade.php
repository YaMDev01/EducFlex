@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $classe->exists ? 'Edition de Classe':'Création de Classe' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($classe->exists ? 'classe.update':'classe.store', $classe) }}" method="POST">
            @csrf
            @method($classe->exists ? 'put':'post')
            <div class="mb-3">
                <label for="level_id" class="form-label">{{ _('Level :') }}</label>
                <select name="level_id" class="form-select @error('level_id') is-invalid @enderror" id="level_id">
                    <option value="{{ $classe->exists ? $classe->level->id.'-'.$classe->level->code:null }}">{{ $classe->exists ? $classe->level->libelle:'Choisissez une option' }}</option>
                    @foreach ( $level as $item_level)
                        @if ($item_level->id != ($classe->level->id ?? '0'))
                        <option value="{{ $item_level->id }}-{{ $item_level->code }}">{{ $item_level->libelle }}</option>
                        @endif
                    @endforeach
                </select>
                @error('level_id')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="serie_id" class="form-label">{{ _('Série :') }}</label>
                <select name="serie_id" class="form-select" id="serie_id">
                    <option value="{{ $classe->exists ? $classe->serie->id:null }}">{{ $classe->exists ? $classe->serie->libelle:'Choisissez une option' }}</option>
                    @foreach ( $serie as $item_serie)
                        @if ($item_serie->id != ($classe->serie->id ?? '0'))
                        <option value="{{ $item_serie->id }}-{{ $item_serie->libelle }}">{{ $item_serie->libelle }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="effectif" class="form-label">{{ ('Effectif :') }}</label>
                <input type="number" name="effectif" class="form-control @error('effectif') is-invalid @enderror" id="effectif" value="{{ old('effectif', $classe->effectif) }}">
                @error('effectif')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            @if ($classe->exists)
            <div class="mb-4 mx-2">
                <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $classe->actif ? 'checked':null }}>
                <label class="form-label" for="actif">{{ __('Activation') }}</label>
            </div>
            @endif
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $classe->exists ? 'secondary':'primary'}}">
                    {{ $classe->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

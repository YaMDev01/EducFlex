@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $scolarite->exists ? 'Edition de scolarité':'Création de scolarité' }}
            </h5>
        </div>
        <div class="card-body">
            @php
                $id = $scolarite->level->id ?? null;
            @endphp
        <form action="{{ Route($scolarite->exists ? 'scolarite.update':'scolarite.store', $scolarite) }}" method="POST">
            @csrf
            @method($scolarite->exists ? 'put':'post')
            <div class="form-group mb-3">
                <label for="level_id" class="form-label">Niveau <span class="text-danger">*</span>  :</label>
                <select id="level_id" name="level_id" class="form-select @error('level_id') is-invalid @enderror">
                    <option value="{{ $scolarite->exists ? $id:null }}">{{ $scolarite->exists ? $scolarite->level->libelle:'Choisissez une option' }}</option>
                    @foreach ($level as $item)
                        @if ($item->id != $id)
                        <option value="{{ $item->id }}">{{ ucfirst($item->libelle) }}</option>
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
                <label for="mtnt_affecte" class="form-label">{{ ('Affecté :') }}</label>
                <input type="number" name="mtnt_affecte" class="form-control @error('mtnt_affecte') is-invalid @enderror" id="mtnt_affecte" value="{{ old('mtnt_affecte', $scolarite->mtnt_affecte) }}">
                @error('mtnt_affecte')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="mtnt_non_affecte" class="form-label">{{ ('Non Affecté :') }}</label>
                <input type="number" name="mtnt_non_affecte" class="form-control @error('mtnt_non_affecte') is-invalid @enderror" id="mtnt_non_affecte" value="{{ old('mtnt_non_affecte', $scolarite->mtnt_non_affecte) }}">
                @error('mtnt_non_affecte')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="mb-4 mx-2">
                @if ($scolarite->exists)
                    <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $scolarite->actif ? 'checked':null }}>
                    <label class="form-label" for="actif">{{ __('Activation') }}</label>

                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $scolarite->exists ? 'secondary':'primary'}}">
                    {{ $scolarite->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

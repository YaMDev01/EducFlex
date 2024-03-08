@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">Création de série
                {{-- {{ $serie->exists ? 'Edition de série':'Création de série' }} --}}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route('student.store') }}" method="POST">
            @csrf
            {{-- @method($serie->exists ? 'put':'post') --}}
            <div class="row">
                <div class="col-12 col-sm-6 mb-3">
                    <label for="matricule" class="form-label">{{ ('Matricule :') }}</label>
                    <input type="text" name="Matricule" class="form-control @error('Matricule') is-invalid @enderror" id="Matricule" value="{{ old('Matricule') }}">
                    @error('Matricule')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="sexe" class="form-label">{{ ('Sexe :') }}</label>
                    <select name="sexe" class="form-select @error('sexe') is-invalid @enderror" id="sexe">
                    <option value="">{{ __('Choisissez une option') }}</option>
                    </select>
                    @error('sexe')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="nom" class="form-label">{{ ('Nom :') }}</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom') }}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="prenom" class="form-label">{{ ('Prenoms :') }}</label>
                    <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="prenom" value="{{ old('prenom') }}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="date_nais" class="form-label">{{ ('Date de naissance :') }}</label>
                    <input type="date" name="date_nais" class="form-control @error('date_nais') is-invalid @enderror" id="date_nais" value="{{ old('date_nais') }}">
                    @error('date_nais')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="lieu_nais" class="form-label">{{ ('Lieu de naissance :') }}</label>
                    <input type="text" name="lieu_nais" class="form-control @error('lieu_nais') is-invalid @enderror" id="lieu_nais" value="{{ old('lieu_nais') }}">
                    @error('lieu_nais')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="nationality_id" class="form-label">{{ ('Nationalité :') }}</label>
                    <select name="nationality_id" class="form-select @error('nationality_id') is-invalid @enderror" id="nationality_id">
                        <option value="">{{ __('Choisissez une option') }}</option>
                        @foreach ($nationalite as $item)
                        <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                        @endforeach
                    </select>
                    @error('nationality_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="lieu_residence" class="form-label">{{ ('Lieu d\'habitation :') }}</label>
                    <input type="text" name="lieu_residence" class="form-control @error('lieu_residence') is-invalid @enderror" id="lieu_residence" value="{{ old('lieu_residence') }}">
                    @error('lieu_residence')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="etablissement_origine" class="form-label">{{ ('Etablissement d\'origine :') }}</label>
                    <input type="text" name="etablissement_origine" class="form-control @error('etablissement_origine') is-invalid @enderror" id="etablissement_origine" value="{{ old('etablissement_origine') }}">
                    @error('etablissement_origine')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="avatar" class="form-label">{{ ('Photo d\'identité :') }}</label>
                    <input type="file" name="avatar" class="form-control" id="avatar">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="nom_prenom_pere" class="form-label">{{ ('Nom et Prenoms du père :') }}</label>
                    <input type="text" name="nom_prenom_pere" class="form-control" id="nom_prenom_pere" value="{{ old('nom_prenom_pere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="profession_pere" class="form-label">{{ ('Profession du père :') }}</label>
                    <input type="text" name="profession_pere" class="form-control" id="profession_pere" value="{{ old('profession_pere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="contact_pere" class="form-label">{{ ('Contact du père :') }}</label>
                    <input type="number" name="contact_pere" class="form-control" id="contact_pere" value="{{ old('contact_pere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="nom_prenom_mere" class="form-label">{{ ('Nom et Prenoms de la mère :') }}</label>
                    <input type="text" name="nom_prenom_pere" class="form-control" id="nom_prenom_mere" value="{{ old('nom_prenom_pere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="profession_mere" class="form-label">{{ ('Profession de la mère :') }}</label>
                    <input type="text" name="profession_mere" class="form-control" id="profession_mere" value="{{ old('profession_mere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="contact_mere" class="form-label">{{ ('Contact de ma mère :') }}</label>
                    <input type="number" name="contact_mere" class="form-control" id="contact_mere" value="{{ old('contact_mere') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="nom_prenom_tuteur" class="form-label">{{ ('Nom et Prenoms du tuteur :') }}</label>
                    <input type="text" name="nom_prenom_tuteur" class="form-control" id="nom_prenom_tuteur" value="{{ old('nom_prenom_tuteur') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="profession_tuteur" class="form-label">{{ ('Profession du tuteur :') }}</label>
                    <input type="text" name="profession_tuteur" class="form-control" id="profession_tuteur" value="{{ old('profession_tuteur') }}">
                </div>

                <div class="col-12 col-sm-6 mb-3">
                    <label for="contact_tuteur" class="form-label">{{ ('Contact du tuteur :') }}</label>
                    <input type="number" name="contact_tuteur" class="form-control" id="contact_tuteur" value="{{ old('contact_tuteur') }}">
                </div>

            </div>

            {{-- <div class="mb-5 mx-2">
                @if ($serie->exists)
                    <span class="mx-5">
                        <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $serie->actif ? 'checked':null }}>
                        <label class="form-label" for="actif">{{ __('Activation') }}</label>
                    </span>
                @endif
            </div> --}}
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Enregistrer') }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection
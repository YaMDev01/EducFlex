@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $student->exists ? 'Edition d\'élève':'Création d\'élève' }}
            </h5>
        </div>
        <div class="px-2">
        <form action="{{ Route($student->exists ? 'student.update':'student.store',$student) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method($student->exists ? 'put':'post')
            <div class="row">
                <div class="col-12 col-sm-4 mb-3">
                    <label for="matricule" class="form-label">{{ ('Matricule :') }}</label>
                    <input type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror" id="matricule" value="{{ old('matricule',$student->matricule) }}">
                    @error('matricule')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="affecte" class="form-label">{{ ('Affecté :') }}</label>
                    <select name="affecte" class="form-select @error('affecte') is-invalid @enderror" id="affecte">
                    <option value="{{ $student->exists ? $student->affecte:null }}">{{ $student->exists ? $student->affecte:('Choisissez une option') }}</option>
                    @if($student->exists)
                    <option value="{{ $student->affecte == 'Oui'? 'Non':'Oui' }}">{{ $student->affecte == 'Oui'? 'Non':'Oui' }}</option>
                    @else
                    <option value="Oui">{{ __('Oui') }}</option>
                    <option value="Non">{{ __('Non') }}</option>
                    @endif
                    </select>
                    @error('affecte')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="interne" class="form-label">{{ ('Interne :') }}</label>
                    <input type="text" name="interne" class="form-control @error('interne') is-invalid @enderror" id="interne" value="{{ 'd/p',$student->interne }}">
                    @error('interne')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="genre" class="form-label">{{ ('Genre :') }}</label>
                    <select name="genre" class="form-select @error('genre') is-invalid @enderror" id="genre">
                        @if ($student->exists)
                            @if ($student->genre == 'F')
                            <option value="F">{{ __('Feminin') }}</option>
                            <option value="M">{{ __('Masculin') }}</option>
                            @else
                            <option value="M">{{ __('Masculin') }}</option>
                            <option value="F">{{ __('Feminin') }}</option>
                            @endif
                        @else
                            <option value="">{{ __('Choisissez une option') }}</option>
                            <option value="F">{{ __('Feminin') }}</option>
                            <option value="M">{{ __('Masculin') }}</option>
                        @endif
                    </select>
                    @error('genre')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="nom" class="form-label">{{ ('Nom :') }}</label>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" id="nom" value="{{ old('nom',$student->nom) }}">
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="prenom" class="form-label">{{ ('Prenoms :') }}</label>
                    <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" id="prenom" value="{{ old('prenom',$student->prenom) }}">
                    @error('prenom')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="date_nais" class="form-label">{{ ('Date de naissance :') }}</label>
                    <input type="date" name="date_nais" class="form-control @error('date_nais') is-invalid @enderror" id="date_nais" value="{{ old('date_nais',$student->date_nais) }}">
                    @error('date_nais')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="lieu_nais" class="form-label">{{ ('Lieu de naissance :') }}</label>
                    <input type="text" name="lieu_nais" class="form-control @error('lieu_nais') is-invalid @enderror" id="lieu_nais" value="{{ old('lieu_nais',$student->lieu_nais) }}">
                    @error('lieu_nais')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="nationality_id" class="form-label">{{ ('Nationalité :') }}</label>
                    <select name="nationality_id" class="form-select @error('nationality_id') is-invalid @enderror" id="nationality_id">
                        <option value="{{ $student->exists ? $student->nationality_id:null }}">{{ $student->exists ? $student->nationality->libelle:__('Choisissez une option') }}</option>
                        @foreach ($nationalite as $item)
                            @if ($item->id != $student->nationality_id)
                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('nationality_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="lieu_residence" class="form-label">{{ ('Lieu d\'habitation :') }}</label>
                    <input type="text" name="lieu_residence" class="form-control @error('lieu_residence') is-invalid @enderror" id="lieu_residence" value="{{ old('lieu_residence', $student->lieu_residence) }}">
                    @error('lieu_residence')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="etablissement_origine" class="form-label">{{ ('Etablissement d\'origine :') }}</label>
                    <input type="text" name="etablissement_origine" class="form-control @error('etablissement_origine') is-invalid @enderror" id="etablissement_origine" value="{{ old('etablissement_origine',$student->etablissement_origine) }}">
                    @error('etablissement_origine')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="level_id" class="form-label">{{ ('Niveau d\'etude :') }}</label>
                    <select name="level_id" class="form-select @error('level_id') is-invalid @enderror" id="level_id">
                        <option value="{{ $student->exists ? $student->level_id:null }}">{{ $student->exists ? $student->level->libelle:__('Choisissez une option') }}</option>
                        @foreach ($level as $items)
                            @if ($items->id != $student->level_id)
                            <option value="{{ $items->id }}">{{ $items->libelle }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('level_id')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="boursier" class="form-label">{{ ('Boursier(e) :') }}</label>
                    <select name="boursier" class="form-select @error('boursier') is-invalid @enderror" id="boursier">
                        <option value="{{ $student->exists ? $student->boursier:null }}">{{ $student->exists ? ucfirst($student->boursier):('Choisissez une option') }}</option>
                        @if($student->exists)
                        <option value="{{ $student->boursier == 'oui'? 'Non':'Oui' }}">{{ $student->boursier == 'oui'? 'Non':'Oui' }}</option>
                        @else
                        <option value="Oui">{{ __('Oui') }}</option>
                        <option value="Non">{{ __('Non') }}</option>
                        @endif
                    </select>
                    @error('boursier')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="redoublant" class="form-label">{{ ('Redoublant :') }}</label>
                    <select name="redoublant" class="form-select @error('redoublant') is-invalid @enderror" id="redoublant">
                        <option value="{{ $student->exists ? $student->redoublant:null }}">{{ $student->exists ? ucfirst($student->redoublant):('Choisissez une option') }}</option>
                        @if($student->exists)
                        <option value="{{ $student->redoublant == 'oui'? 'Non':'Oui' }}">{{ $student->redoublant == 'oui'? 'Non':'Oui' }}</option>
                        @else
                        <option value="Oui">{{ __('Oui') }}</option>
                        <option value="Non">{{ __('Non') }}</option>
                        @endif
                    </select>
                    @error('redoublant')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="avatar" class="form-label">{{ ('Photo d\'identité :') }}</label>
                    <input type="file" name="avatar" class="form-control" id="avatar" value="{{ old('avatar',$student->avatar) }}">
                </div>

            </div>
            <div class="row">
                <div class="col-12 col-sm-4 mb-3">
                    <label for="nom_prenom_pere" class="form-label">{{ ('Nom et Prenoms du père :') }}</label>
                    <input type="text" name="nom_prenom_pere" class="form-control" id="nom_prenom_pere" value="{{ old('nom_prenom_pere',$student->nom_prenom_pere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="profession_pere" class="form-label">{{ ('Profession du père :') }}</label>
                    <input type="text" name="profession_pere" class="form-control" id="profession_pere" value="{{ old('profession_pere',$student->profession_pere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="contact_pere" class="form-label">{{ ('Contact du père :') }}</label>
                    <input type="number" name="contact_pere" class="form-control" id="contact_pere" value="{{ old('contact_pere',$student->contact_pere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="nom_prenom_mere" class="form-label">{{ ('Nom et Prenoms de la mère :') }}</label>
                    <input type="text" name="nom_prenom_mere" class="form-control" id="nom_prenom_mere" value="{{ old('nom_prenom_mere',$student->nom_prenom_mere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="profession_mere" class="form-label">{{ ('Profession de la mère :') }}</label>
                    <input type="text" name="profession_mere" class="form-control" id="profession_mere" value="{{ old('profession_mere',$student->profession_mere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="contact_mere" class="form-label">{{ ('Contact de la mère :') }}</label>
                    <input type="number" name="contact_mere" class="form-control" id="contact_mere" value="{{ old('contact_mere',$student->contact_mere) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="nom_prenom_tuteur" class="form-label">{{ ('Nom et Prenoms du tuteur :') }}</label>
                    <input type="text" name="nom_prenom_tuteur" class="form-control" id="nom_prenom_tuteur" value="{{ old('nom_prenom_tuteur',$student->nom_prenom_tuteur) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="profession_tuteur" class="form-label">{{ ('Profession du tuteur :') }}</label>
                    <input type="text" name="profession_tuteur" class="form-control" id="profession_tuteur" value="{{ old('profession_tuteur',$student->profession_tuteur) }}">
                </div>

                <div class="col-12 col-sm-4 mb-3">
                    <label for="contact_tuteur" class="form-label">{{ ('Contact du tuteur :') }}</label>
                    <input type="number" name="contact_tuteur" class="form-control" id="contact_tuteur" value="{{ old('contact_tuteur',$student->contact_tuteur) }}">
                </div>

            </div>

            <div class="mb-5">
                @if ($student->exists)
                    <span class="mx-2">
                        <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" {{ $student->actif ? 'checked':null }}>
                        <label class="form-label" for="actif">{{ __('Activation') }}</label>
                    </span>
                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-primary">
                    {{ $student->exists ? __('Valider les modifications'):__('Enregistrer') }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

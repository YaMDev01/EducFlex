@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $school_year->exists ? 'Edition d\'Année scolaire':'Création d\'Année scolaire' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($school_year->exists ? 'school_year.update':'school_year.store', $school_year) }}" method="POST">
            @csrf
            @method($school_year->exists ? 'put':'post')
            @php
                $selector = 'Choisie une option';
            @endphp
            <div class="mb-3">
                <label for="school_year" class="form-label">{{ ('Année Scolaire :') }}</label>
                <input type="text" name="school_year" class="form-control @error('school_year') is-invalid @enderror" id="school_year" value="{{ old('school_year', $school_year->school_year) }}">
                @error('school_year')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="session" class="form-label">{{ ('Session :') }}</label>
                <select name="session" class="form-select @error('session') is-invalid @enderror" id="session">
                    <option value={{ $school_year->session ?? null }}>
                        @if ($school_year->exists)
                            {{ $school_year->session == '2' ? 'Semestre':'Trimestre' }}
                        @else
                            {{ __('Faite un choix') }}
                        @endif
                    </option>
                    @if ($school_year->exists)
                        <option value="{{ $school_year->session == '2' ? '3':'2' }}">{{ $school_year->session == '2' ? 'Trimestre':'Semestre' }}</option>
                    @else
                    <option value="3">{{ __("Trimestre") }}</option>
                    <option value="2">{{ __('Semestre') }}</option>
                    @endif
                    
                </select>
                @error('session')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-5 mx-2">
                <span>
                    <input type="checkbox" name="cycle1" class="form-checks" id="cycle1" value="1" checked>
                    <label class="form-label mr-3" for="cycle1">{{ __('Cycle 1') }}</label>
                </span>

                <span class="mx-5">
                    <input type="checkbox" name="cycle2" class="form-checks" id="cycle2" value="1" checked>
                    <label class="form-label" for="cycle2">{{ __('Cycle 2') }}</label>
                </span>

                @if ($school_year->exists && $school_year->actif != 1)
                <span class="mx-5">
                    <input type="checkbox" name="actif" class="form-checks" id="actif" value="1">
                    <label class="form-label" for="actif">{{ __('Activation') }}</label>
                </span>
                @elseif ($school_year->exists == null)
                <span class="mx-5">
                    <input type="checkbox" name="actif" class="form-checks" id="actif" value="1" checked>
                    <label class="form-label" for="actif">{{ __('Activation') }}</label>
                </span>
                @endif
            </div>
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $school_year->exists ? 'secondary':'primary'}}">
                    {{ $school_year->exists ? 'Modifier':'Enregistrer' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

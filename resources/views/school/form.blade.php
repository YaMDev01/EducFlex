@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card">
       <div class="card-header d-flex justify-content-between">
          <div class="header-title">
             <h4 class="card-title">{{ $school->exists ? 'Edit School':'Create School' }}</h4>
          </div>
       </div>
       <div class="card-body">
          <div class="new-user-info">
             <form action="{{ Route($school->exists ? 'school.update':'school.store',$school) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method($school->exists ? 'put':'post')
                <div class="row">
                   <div class="form-group col-md-6 mb-3">
                      <label for="code" class="form-label">{{ __('Code') }} <span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                      <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" value="{{ old('code',$school->code) }}">
                      @error('code')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                      @enderror
                   </div>

                   <div class="form-group col-md-6 mb-3">
                        <label for="statut" class="form-label">{{ __('Statut ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                        <select id="disabledSelect" name="statut" class="form-select @error('statut') is-invalid @enderror">
                            <option value={{ $school->statut ?? null  }}>
                                {{ $school->statut ?? 'Choise one value' }}
                            </option>
                            @if ($school->exists)
                                @if ($school->statut == 'prive')
                                <option value="public">{{ __('public') }}</option>
                                <option value="semi-prive">{{ __('semi-prive') }}</option>
                                @endif
                                @if ($school->statut == 'public')
                                <option value="prive">{{ __('prive') }}</option>
                                <option value="semi-prive">{{ __('semi-prive') }}</option>
                                @endif
                                @if ($school->statut == 'semi-prive')
                                <option value="prive">{{ __('prive') }}</option>
                                <option value="public">{{ __('public') }}</option>
                                @endif
                            @else
                                <option value="prive">{{ __('prive') }}</option>
                                <option value="public">{{ __('public') }}</option>
                                <option value="semi-prive">{{ __('semi-prive') }}</option>
                            @endif
                        </select>
                        @error('statut')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                   </div>

                   <div class="form-group col-md-6 mb-3">
                      <label for="name" class="form-label">{{ __('Nom complet ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name',$school->name) }}">
                      @error('name')
                          <span class="invalid-feedback" role="alert">
                            {{ $message }}
                          </span>
                      @enderror
                   </div>

                   <div class="form-group col-md-6 mb-3">
                        <label for="abrege" class="form-label">{{ __('Nom abrégré :') }}</label>
                        <input type="text" name="abrege" class="form-control @error('abrege') is-invalid @enderror" id="abrege" value="{{ old('abrege',$school->abrege) }}">
                   </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="code_postal" class="form-label">{{ __('Code postal :') }}</label>
                        <input type="text" name="code_postal" class="form-control @error('code_postal') is-invalid @enderror" id="code_postal" value="{{ old('code_postal',$school->code_postal) }}">
                        @error('code_postal')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="address" class="form-label">{{ __('Adresse électronique :') }}</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" value="{{ old('address',$school->address) }}">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="email" class="form-label">{{ __('Adresse email ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email',$school->email) }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="telephon" class="form-label">{{ __('Téléphone ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                        <input type="number" name="telephon" class="form-control @error('telephon') is-invalid @enderror" id="telephon" value="{{ old('telephon',$school->telephon) }}">
                        @error('telephon')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="city" class="form-label">{{ __('Ville ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" id="city" value="{{ old('city',$school->city) }}">
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="dren" class="form-label">{{ __('DREN ') }}<span class="text-danger">{{ __('*') }}</span> {{ __(' :') }}</label>
                        <input type="text" name="dren" class="form-control @error('dren') is-invalid @enderror" id="dren" value="{{ old('dren',$school->dren) }}">
                        @error('dren')
                            <span class="invalid-feedback" role="alert">
                            {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-12 mb-3">
                        <label for="descriptif" class="form-label">{{ __('Descriptif :') }}</label>
                        <textarea class="form-control" name="descriptif" id="descriptif" aria-label="With textarea">{{ old('descriptif',$school->descriptif) }}</textarea>
                    </div>

                    <div class="form-group col-md-6 mb-3">
                        <label for="avatar" class="form-label">{{ __('Logo school :') }}</label>
                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" id="avatar" value="{{ old('avatar') }}">
                    </div>

                    @if ($school->exists)
                    <div class="form-group col-md-4 mt-5 mx-5">
                        <input type="checkbox" name="actif" id="actif" class="mx-2" value="1" {{ $school->actif ? 'checked':null }}>
                        <label for="actif" class="form-label">{{ __('Actif') }}</label>
                    </div>
                    @endif
                </div>
                <hr>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">{{ $school->exists ? 'Modifier':'Enregistrer' }}</button>
                </div>
             </form>
          </div>
       </div>
    </div>
</div>
@endsection
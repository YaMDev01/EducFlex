@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <div class="">
            <h5 class="card-title fw-semibold mb-4" style="color: #161f22;">
                {{ $licence->exists ? 'Edition de licence':'Génération de licence' }}
            </h5>
        </div>
        <div class="card-body">
        <form action="{{ Route($licence->exists ? 'licence.update':'licence.store', $licence) }}" method="POST">
            @csrf
            @method($licence->exists ? 'put':'post')
            @php
                $selector = 'Choisie une option';
            @endphp
            <div class="mb-4">
                <label for="date_aspiration" class="form-label">{{ ('Type de licence :') }}</label>
                <select id="disabledSelect" class="form-select @error('duree') is-invalid @enderror" name="duree">
                    <option value="{{ $licence->exists ? $licence->duree:'' }}">
                        @if ($licence->duree == 1)
                        {{ $licence->duree ? $licence->duree.' an' :$selector }}
                        @else
                        {{ $licence->duree ? $licence->duree.' ans' :$selector }}
                        @endif
                    </option>
                    @for ($i = 1; $i<= 5; $i++)
                        @if ($i != $licence->duree)
                            <option value="{{ $i }}">{{ $i == '1' ? $i.' an':$i.' ans' }}</option>
                        @endif
                    @endfor
                </select>
                @error('duree')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($licence->exists)
            <div class="mb-2">
                <label for="licence" class="form-label">{{ __('Code licenec :') }}</label>
                <input type="text" class="form-control" id="licence" value="{{ $licence->code }}" disabled>
            </div>
            <div class="mb-5 form-check">
                <input type="checkbox" name="actif" class="form-check-input" id="actif" value="1" {{ $licence->actif ? 'checked':null }}>
                <label class="form-check-label" for="actif">{{ __('Activation') }}</label>
            </div>
            @endif
            <div class="text-center pt-2">
                <button type="submit" class="btn btn-{{ $licence->exists ? 'secondary':'primary'}}">
                    {{ $licence->exists ? 'Modifier la licence':'Générer la licence' }}
                </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

@endsection

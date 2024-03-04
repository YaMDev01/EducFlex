@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion de la licence') }}</h5>
        <a href="{{ Route($licence->exists ? 'licence.edit':'licence.create',$licence) }}" class="btn btn-info btn-dm">
            {{ $licence->exists ? 'Editer la licence':'Générer la licence' }}
        </a>
    </div>
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col" style="width: 10%"></th>
                <th scope="col">{{ __('Code de la licence') }}</th>
                <th scope="col">{{ __('Durée de la licence') }}</th>
                <th scope="col">{{ __('Date d\'aspiration') }}</th>
                </tr>
            </thead>
            <tbody>
                @if ($licence->exists)
                <tr>
                    <td>{{ $licence->actif ? 'Actif':'Inactif' }}</td>
                    <td>{{ $licence->code }}</td>
                    <td>{{ $licence->duree }} {{ $licence->duree == 1 ? 'an':'ans' }}</td>
                    <td>{{ $licence->date_aspire }}</td>
                </tr>
                @else
                <tr>
                    <th colspan="4" class="text-center">
                        {{ __('Pas de licence disponible') }}
                    </th>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
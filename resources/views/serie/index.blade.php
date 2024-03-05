@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion des séries') }}</h5>
        <a href="{{ Route('serie.create') }}" class="btn btn-info btn-dm">
            {{ __('Ajout de série') }}
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
                <th scope="col">{{ __('Série') }}</th>
                <th scope="col">{{ __('Genre') }}</th>
                <th scope="col">{{ __('Statut') }}</th>
                <th scope="col" style="width: 15%">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($serie as $item)
                <tr>
                    <td>{{ $i += 1 }}</td>
                    <td>{{ ucfirst($item->libelle) }}</td>
                    <td>{{ ucfirst($item->genre) }}</td>
                    <td>{{ $item->actif ? 'Actif':'Inact' }}</td>
                    <td>
                        <div class="d-flex align-items-center list-action">
                            <a class="btn btn-outline-info mx-2 py-1 px-2" title="Edit" href="{{ Route('serie.edit',$item) }}">
                                <i class="ri-pencil-line mr-0"></i>
                            </a>
                            <form action="{{ Route('serie.destroy',$item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger mx-2 py-1 px-2" title="Delete" {{ $item->actif ? 'disabled':null }}>
                                    <i class="ri-delete-bin-line mr-0"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="4" class="text-center">
                        {{ __('Pas de données disponible') }}
                    </th>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection

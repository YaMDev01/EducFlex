@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion du niveau') }}</h5>
    </div>
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
                <th scope="col">{{ __('cycle') }}</th>
                <th scope="col">{{ __('Statut') }}</th>
                <th scope="col" style="width: 20%">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($cycle as $item)
                <tr>
                    <td>{{ $i += 1 }}</td>
                    <td>{{ $item->libelle }}</td>
                    <td>{{ $item->actif ? 'Actif':'Inactif' }}</td>
                    <td>
                        <form action="{{ Route('cycle.update',$item) }}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-outline-warning mx-2 py-1 px-2" title="Rendre {{ $item->actif ? 'inactif':'actif' }}">
                                <i class="ri-pencil-line mr-0"></i>
                            </button>
                        </form>
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
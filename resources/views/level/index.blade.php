@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion du niveau') }}</h5>
    </div>
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col" style="width: 10%"></th>
                <th scope="col">{{ __('Level') }}</th>
                <th scope="col">{{ __('Code') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($level as $item)
                <tr>
                    <td>{{ $i += 1 }}</td>
                    <td>{{ $item->libelle }}</td>
                    <td>{{ $item->code }}</td>
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
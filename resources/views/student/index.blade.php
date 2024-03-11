@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion des élèves') }}</h5>
        <a href="{{ Route('student.create') }}" class="btn btn-info btn-dm">
            {{ __('Ajout élève') }}
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <i class="bi bi-check-circle me-1"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="card-title mx-5 d-flex justify-content-between">
                <div class="d-flex">
                    <h6 class="mr-3">{{ __('Disponible : ') }} <strong>{{ $dispo }}</strong></h6>
                    <span class="mx-2" style="font-size: 12px">{{ __('Nouvaeu : ') }} {{ $new }}</span>
                    <span class="mx-2" style="font-size: 12px">{{ __('Ancien : ') }} {{ $dispo-$new }}</span>
                </div>
                <h6>{{ __('Non disponible : ') }} {{ $total-$dispo }}</h6>
                <h6>{{ __('Total : ') }}{{ $total }}</h6>
            </div>
            <form method="get">
                <div class="row mx-5 mt-0">
                <div class="col-12 col-sm-4 mb-3">
                    <input type="text" name="matricule" class="form-control" value="{{ old('matricule') }}" placeholder="Recherche par matricule">
                </div>
                <div class="col-12 col-sm-4 mb-3">
                    <input type="text" name="school_year" class="form-control" value="{{ old('school_year') }}" placeholder="Rechercher par année scolaire">
                </div>
                <div class="col-12 col-sm-4 mb-3">
                    <input type="text" name="date_fin" class="form-control" id="avatar" value="{{ old('date_fin') }}" placeholder="Date de fin">
                </div>
                <div class="text-center">
                    <button class="btn btn-info w-25 flex-grow-0">
                        {{ _('Recherche') }}
                        <i class="ri-search-line mx-3"></i>
                    </button>
                </div>
                </div>
            </form>
        </div>
      </div>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col" style="width: 5%"></th>
            <th scope="col" style="width: 10%">{{ __('Matricule') }}</th>
            <th scope="col" style="width: 10%">{{ __('Nom') }}</th>
            <th scope="col" style="width: 20%">{{ __('Prénoms') }}</th>
            <th scope="col" style="width: 10%">{{ __('Sexe') }}</th>
            <th scope="col" style="width: 20%">{{ __('Parent') }}</th>
            <th scope="col" style="width: 10%">{{ __('Contact') }}</th>
            <th scope="col" style="width: 8%">{{ __('Statut') }}</th>
            <th scope="col" style="width: 10%">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($student as $item)
            <tr>
                <td>
                    <img src="{{ $item->avatarUrl()?? asset('assets/images/user_default.jpg') }}" class="m-0" style="border-radius: 25px;width:35px;height:35px">
                </td>
                <td>{{ $item->matricule }}</td>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->prenom }}</td>
                <td>{{ $item->genre }}</td>
                <td>{{ $item->nom_prenom_pere }}</td>
                <td>{{ $item->contact_pere }}</td>
                <td>{{ $item->actif ? 'Actif':'Inactif' }}</td>
                <td>
                    <div class="d-flex align-items-center list-action">
                        {{-- <a class="btn btn-outline-info mx-2 py-1 px-2" title="Edit" href="{{ Route('student.edit',$item) }}">
                            <i class="ri-pencil-line mr-0"></i>
                        </a> --}}
                        <a class="btn btn-outline-warning mx-2 py-1 px-2" title="Detail" href="{{ Route('student.show',$item) }}">
                            <i class="ri-eye-line mr-0"></i>
                        </a>
                        <form action="{{ Route('student.destroy',$item) }}" method="post">
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

@endsection

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <h5 class="card-title fw-semibold mb-4">{{ __('Gestion de la licence') }}</h5>
        <a href="{{ Route('licence.create') }}" class="btn btn-info btn-dm">{{ __('Générer la licence') }}</a>
    </div>
    <div class="mt-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Code de la licence</th>
                <th scope="col">Date d'aspiration</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                
            </tbody>
        </table>
    </div>
</div>

@endsection
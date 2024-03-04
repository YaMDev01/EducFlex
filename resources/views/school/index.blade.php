@extends('layouts.app')

@section('content')

<div class="row m-sm-0 px-3">
    <div class="col-lg-10 offset-lg-1 text-center">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <i class="bi bi-check-circle me-1"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
       <div class="card card-block card-stretch card-height">
            <div class="card-body mx-lg-5">
                <div class="text-center mb-3">
                    <div class="profile-img mb-3">
                        <img src="{{ asset('assets/images/backgrounds/logo.png') }}" class="img-fluid rounded" alt="profile-image" width="150" style="border: 1px solid">
                    </div>
                    <div class="ml-3">
                        <h4>{{ $school->name }}</h4>
                        <h6>Statut : {{ $school->statut }}</h6>
                    </div>
                </div>
                <p class="text-center h6 mb-2">{{ $school->descriptif }}</p>
                <div class="text-center">
                    <ul class="list-inline">
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <svg class="svg-icon mr-3" height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <h5 class="mb-0" style="margin-left: 2%">{{ $school->city }}</h5>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex align-items-center">
                                <svg class="svg-icon mr-3" height="25" width="25" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <h5 class="mb-0" style="margin-left: 2%">DREN : {{ $school->dren }}</h5>
                            </div>
                        </li>
                        <li class="mb-3">
                        <div class="d-flex align-items-center">
                            <svg class="svg-icon mr-3" height="22" width="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <h5 class="mb-0" style="margin-left: 2%">{{ $school->code_postal }}</h5>
                        </div>
                        </li>
                        <li class="mb-3">
                        <div class="d-flex align-items-center">
                            <svg class="svg-icon mr-3" height="22" width="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z"></path>
                            </svg>
                            <h5 class="mb-0" style="margin-left: 2%">(+225) {{ $school->address }}</h5>
                        </div>
                        </li>
                        <li class="mb-3">
                        <div class="d-flex align-items-center">
                            <svg class="svg-icon mr-3" height="22" width="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <h5 class="mb-0" style="margin-left: 2%">(+225) {{ $school->telephon }}</h5>
                        </div>
                        </li>
                        <li>
                        <div class="d-flex align-items-center">
                            <svg class="svg-icon mr-3" height="22" width="22" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <h5 class="mb-0" style="margin-left: 2%">{{ $school->email }}</h5>
                        </div>
                        </li>
                    </ul>
                </div>
                <div class="mt-2">
                    <a href="{{ Route($school->exists ? 'school.edit':'school.create',$school) }}" class="btn btn-secondary">
                        {{ $school->exists ? 'Edit School':'Create School' }}
                    </a>
                </div>
            </div>
       </div>
    </div>
 </div>

@endsection
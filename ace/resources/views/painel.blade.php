@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pb-3">
            Dashboard
        </h2>
        <div class="row d-flex justify-content-between pb-4">
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Briefings <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-postcard pe-2"></i>{{ $resumos->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Sites <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-columns pe-2"></i>{{ $sites->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Clientes <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-person pe-2"></i>{{ $clientes->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between pb-5">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center py-3">
                        <h4>Informações</h4>
                        <div class="dropdown">
                            <span class="btn rounded-pill p-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i></span>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover pb-5">
                            <thead>
                                <tr>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Venc. Host</th>
                                    <th scope="col">Venc. Domínio</th>
                                    <th scope="col">site</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            @foreach ($sites as $site)
                                <tbody>
                                    <tr>
                                        <td class="row d-flex justify-content-between">
                                            <span>{{ $site->clientes->nome }} {{ $site->clientes->sobrenome }}</span>
                                            <span>{{ $site->clientes->email }}</span>
                                        </td>
                                        <td> {{ $site->vencimento_hospedagem }} </td>
                                        <td> {{ $site->vencimento_dominio }} </td>
                                        <td><a href="https://{{ $site->dominio }}" target="_blank">{{ $site->dominio }}</a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-info">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-warning mx-3">
                                                <i class="bi bi-ban"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

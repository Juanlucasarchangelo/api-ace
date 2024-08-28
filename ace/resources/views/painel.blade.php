@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="pb-3">Dashboard</h2>
        <div class="row d-flex justify-content-between pb-5">
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Briefings <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-postcard pe-2"></i>{{ $resumos->count() }}</span>
                    </div>
                    <div class="card-body">
                        Quantidade de briefings ativos na plataforma.
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Sites <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-columns pe-2"></i>{{ $sites->count() }}</span>
                    </div>
                    <div class="card-body">
                        Quantidade de sites ativos na plataforma.
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Clientes <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-person pe-2"></i>{{ $clientes->count() }}</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">

                            </div>
                        </div>
                        Quantidade de clientes ativos na plataforma.
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Briefings <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-postcard pe-2"></i>{{ $resumos->count() }}</span>
                    </div>
                    <div class="card-body bg-warning">
                        Gráfico de historico de clientes.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

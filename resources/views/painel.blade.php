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
                    <div class="card-header d-flex justify-content-between align-items-center pt-3">
                        <h4>Informações</h4>
                        <div class="dropdown">
                            <span class="btn rounded-pill p-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i></span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Excluir Sessão</a></li>
                                <li><a class="dropdown-item" href="#">Desabilitar</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <table-component :colunas="['Cliente', 'Venc. Host', 'Venc. Domínio', 'Site', 'Ações']" token_csrf="{{ @csrf_token() }}"></table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
        <modal-info-component token_csrf="{{ @csrf_token() }}"></modal-info-component>
    </div> --}}
@endsection

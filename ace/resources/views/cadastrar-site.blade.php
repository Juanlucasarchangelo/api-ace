@extends('layouts.app')

@section('content')
    <div class="container pb-3">
        <h2 class="pb-3">
            Cadastrar Site
        </h2>
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row d-flex">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="dominio" placeholder="seudominio.com">
                                <label for="dominio">Dominio</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="hospedagem" placeholder="Hostgator">
                                <label for="hospedagem">Hoepdagem</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-floating pb-3">
                                <select class="form-select" id="responsaveis" aria-label="Floating label select example">
                                    <option selected>Responsaveis</option>
                                    @foreach ($clientes as $key => $cliente)
                                        <option value="{{ $key }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                                <label for="responsaveis">Selecione o dono do site</label>
                            </div>
                        </div>
                        {{-- <div class="col-6">
                            <div class="form-floating pb-3">
                                <select class="form-select" id="responsaveis" aria-label="Floating label select example">
                                    <option selected>Responsaveis</option>
                                    @foreach ($resumos as $key => $resumo)
                                        <option value="{{ $key }}">{{ $resumo->briefing }}</option>
                                    @endforeach
                                </select>
                                <label for="responsaveis">Selecione o briefing do site</label>
                            </div>
                        </div> --}}
                    </div>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container pb-3">
        <h2 class="pb-3">
            Cadastrar Cliente
        </h2>
        <div class="card">
            <div class="card-body">
                <form-component token_csrf="{{ @csrf_token() }}" tabela="cliente"></form-component>
            </div>
        </div>
    </div>
@endsection

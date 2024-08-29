@extends('layouts.app')

@section('content')
    <div class="container pb-3">
        <h2 class="pb-3">
            Cadastrar Site
        </h2>
        <div class="card">
            <div class="card-body">
                <form-component token_csrf="{{ @csrf_token() }}"></form-component>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <cliente-listar-component token_csrf="{{ @csrf_token() }}"></cliente-listar-component>
@endsection

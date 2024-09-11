<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Resumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class CadastrarSite extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cadastrar-site');
    }
}

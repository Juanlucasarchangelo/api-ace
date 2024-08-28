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

    public function index(Request $request)
    {
        $clientes = Cliente::all();
        $resumos = Resumo::all();

        return view('cadastrar-site', ['clientes' => $clientes, 'resumos' => $resumos]);
    }
}

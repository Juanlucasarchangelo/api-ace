<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Resumo;
use App\Models\Site;
use Illuminate\Http\Request;

class PainelController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sites = Site::all();
        $clientes = Cliente::all();
        $resumos = Resumo::all();

        return view('painel', ['sites' => $sites, 'clientes' => $clientes, 'resumos' => $resumos]);
    }
}

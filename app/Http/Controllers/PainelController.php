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
        return view('painel');
    }
}

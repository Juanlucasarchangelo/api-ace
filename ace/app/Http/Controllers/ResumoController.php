<?php

namespace App\Http\Controllers;

use App\Models\Resumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nome' => 'required',
                'sobrenome' => 'required',
                'email' => 'required',
                'cpf_cnpj' => 'required',
                'telefone' => 'required',
                'endereco' => 'required',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->errors()->all()], 422);
        }

        try {
            Resumo::create([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'email' => $request->email,
                'cpf_cnpj' => $request->cpf_cnpj,
                'telefone' => $request->telefone,
                'enderecos_id' => $request->endereco,
            ]);

            return response()->json(['mensagem' => 'Registro criado com sucesso.'], 200);
        } catch (\Exception $e) {
            return response()->json(['mensagem' => 'Erro ao processar a requisição.', 'erro' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Resumo $resumo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resumo $resumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resumo $resumo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resumo $resumo)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $clientes = Cliente::with('enderecos:id,endereco,cidade,bairro,numero,complemento,cep')
                ->get()
                ->makeHidden(['deleted_at', 'created_at', 'updated_at']);

            $listar = $clientes->map(function ($cliente) {
                return [
                    'id' => $cliente->id,
                    'nome' => $cliente->nome,
                    'sobrenome' => $cliente->sobrenome,
                    'email' => $cliente->email,
                    'cpf_cnpj' => $cliente->cpf_cnpj,
                    'telefone' => $cliente->telefone,
                    'endereco' => $cliente->enderecos->endereco,
                    'cidade' => $cliente->enderecos->cidade,
                    'bairro' =>  $cliente->enderecos->bairro,
                    'numero' => $cliente->enderecos->numero,
                    'complemeto' => $cliente->enderecos->complemento,
                    'cep' => $cliente->enderecos->cep,
                ];
            });

            return response()->json(['mensagem' => $listar], 200);
        } catch (\Exception $e) {
            return response()->json(['mensagem' => 'Erro ao processar a requisição.', 'erro' => $e->getMessage()], 500);
        }
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
                'enderecos_id' => 'required',
            ],
            [
                'required' => 'O campo :attribute é obrigatório.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->errors()->all()], 422);
        }

        try {
            Cliente::create([
                'nome' => $request->nome,
                'sobrenome' => $request->sobrenome,
                'email' => $request->email,
                'cpf_cnpj' => $request->cpf_cnpj,
                'telefone' => $request->telefone,
                'enderecos_id' => $request->enderecos_id,
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
    public function show()
    {
        return view('cliente/listar-cliente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}

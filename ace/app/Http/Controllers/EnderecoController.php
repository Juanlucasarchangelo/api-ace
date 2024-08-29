<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $enderecos = Endereco::all()->makeHidden(['deleted_at', 'created_at', 'updated_at']);

            $listar = $enderecos->map(function ($endereco) {
                return [
                    'id' => $endereco->id,
                    'endereco' => $endereco->endereco,
                    'cidade' => $endereco->cidade,
                    'numero' => $endereco->numero,
                    'bairro' => $endereco->bairro,
                    'complemento' => $endereco->complemento,
                    'cep' => $endereco->cep
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
                'endereco' => 'required',
                'cidade' => 'required',
                'bairro' => 'required',
                'numero' => 'required',
                'cep' => 'required|max:8'
            ],
            [
                'required' => 'O campo :attribute é obrigatório.',
                'max' => 'O campo :attribute excedeu o limite de caracteres.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->errors()->all()], 422);
        }

        try {
            Endereco::create([
                'endereco' => $request->endereco,
                'cidade' => $request->cidade,
                'bairro' => $request->bairro,
                'numero' => $request->numero,
                'complemento' => $request->complemento,
                'cep' => $request->cep,
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
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Endereco $endereco)
    {
        //
    }
}

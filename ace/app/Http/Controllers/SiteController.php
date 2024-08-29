<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sites = Site::with('clientes:id,nome,sobrenome,email,cpf_cnpj,telefone', 'resumos:id,briefing,data_entrega')
                ->get()
                ->makeHidden(['deleted_at', 'created_at', 'updated_at']);

            $listar = $sites->map(function ($site) {
                return [
                    'id' => $site->id,
                    'briefing' => $site->resumos->briefing,
                    'data_entrega' => $site->resumos->data_entrega,
                    'responsavel' => $site->clientes->nome,
                    'sobrenome' => $site->clientes->sobrenome,
                    'email' => $site->clientes->email,
                    'cpf_cnpj' => $site->clientes->cpf_cnpj,
                    'telefone' => $site->clientes->telefone,
                    'dominio' => $site->dominio,
                    'acesso_email' => $site->acesso_email,
                    'email_profissional' => $site->email_profissional,
                    'drive' => $site->drive,
                    'youtube' => $site->youtube,
                    'facebook' => $site->facebook,
                    'linkedin' => $site->linkedin,
                    'gmail' => $site->gmail,
                    'instagram' => $site->instagram,
                    'linktree' => $site->linktree,
                    'info_adicionais' => $site->info_adicionais,
                    'registro_dominio' => $site->registro_dominio,
                    'usuario_dominio' => $site->usuario_dominio,
                    'senha_dominio' => $site->senha_dominio,
                    'hospedagem' => $site->hospedagem,
                    'usuario_hospedagem' => $site->usuario_hospedagem,
                    'senha_hospedagem' => $site->senha_hospedagem,
                    'dns_primario' => $site->dns_primario,
                    'dns_secundario' => $site->dns_secundario,
                    'ftp' => $site->ftp,
                    'usuario_ftp' => $site->usuario_ftp,
                    'senha_ftp' => $site->senha_ftp,
                    'link_site_adm' => $site->link_site_adm,
                    'usuario_site_adm' => $site->usuario_site_adm,
                    'senha_site_adm' => $site->senha_site_adm,
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
                'clientes_id' => 'required',
                'dominio' => 'required',
                'hospedagem' => 'required'
            ],
            [
                'required' => 'O campo :attribute é obrigatório.'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['erros' => $validator->errors()->all()], 422);
        }

        try {
            Site::create([
                'clientes_id' => $request->clientes_id,
                'resumos_id' => 1,
                'dominio' => $request->dominio,
                'acesso_email' => $request->acesso_email,
                'email_profissional' => $request->email_profissional,
                'drive' => $request->drive,
                'youtube' => $request->youtube,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'gmail' => $request->gmail,
                'instagram' => $request->instagram,
                'linktree' => $request->linktree,
                'info_adicionais' => $request->info_adicionais,
                'registro_dominio' => $request->registro_dominio,
                'vencimento_dominio' => $request->vencimento_dominio,
                'usuario_dominio' => $request->usuario_dominio,
                'senha_dominio' => $request->senha_dominio,
                'hospedagem' => $request->hospedagem,
                'vencimento_hospedagem' => $request->vencimento_hospedagem,
                'usuario_hospedagem' => $request->usuario_hospedagem,
                'senha_hospedagem' => $request->senha_hospedagem,
                'dns_primario' => $request->dns_primario,
                'dns_secundario' => $request->dns_secundario,
                'ftp' => $request->ftp,
                'usuario_ftp' => $request->usuario_ftp,
                'senha_ftp' => $request->senha_ftp,
                'link_site_adm' => $request->link_site_adm,
                'usuario_site_adm' => $request->usuario_site_adm,
                'senha_site_adm' => $request->senha_site_adm,
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
    public function show(Site $site)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
        //
    }
}

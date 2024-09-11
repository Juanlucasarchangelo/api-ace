<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Consulte e atualize informações</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" :value="token_csrf" name="token_csrf">
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" v-model="nome" placeholder=" " disabled>
                            <label for="nome">Nome</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="sobrenome" v-model="sobrenome" placeholder=" "
                                disabled>
                            <label for="sobrenome">Sobrenome</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" v-model="email" placeholder=" "
                                disabled>
                            <label for="email">E-mail</label>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="cpf_cnpj" v-model="cpf_cnpj" placeholder=" "
                                disabled>
                            <label for="cpf_cnpj">CPF/CNPJ</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="telefone" v-model="telefone" placeholder=" "
                                disabled>
                            <label for="telefone">Telefone</label>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                        <div class="col-12">
                            <div class="form-floating pb-3">
                                <select class="form-select" id="endereco_form" v-model="endereco_form"
                                    aria-label="Floating label select example">
                                    <option selected>Responsáveis</option>
                                    <option v-if="enderecos && enderecos.mensagem"
                                        v-for="endereco in enderecos.mensagem" :key="endereco.id" :value="endereco.id">
                                        {{ endereco.endereco + ', ' + endereco.bairro + ', ' + endereco.cidade + ', ' +
                                            endereco.numero + ' - ' + endereco.cep }}
                                    </option>
                                </select>
                                <label for="endereco_form">Selecione o responsavel.</label>
                            </div>
                        </div>
                    </div> -->
                <h4 class="d-flex justify-content-between pt-4">Briefing <h6 class="text-success">Data prevista para
                        entrega: {{ data_entrega }}</h6>
                </h4>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <textarea class="form-control" v-model="briefing" placeholder=" " id="briefing"
                                    style="height: 100px" disabled></textarea>
                                <label for="briefing">Descrição</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="d-flex justify-content-between pt-4">Informações de Acesso</h4>
                <hr>
                <div class="row d-flex">
                    <div class="col-6">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="dominio" id="dominio" placeholder=" ">
                                <label for="dominio">Domínio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="acesso_email" id="acesso_email"
                                    placeholder=" ">
                                <label for="acesso_email">Acesso e-mail</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <textarea class="form-control" v-model="email_profissional" placeholder=""
                                    id="email_profissional" style="height: 100px"></textarea>
                                <label for="email_profissional">Emails profissionais</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-3">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="drive" id="drive" placeholder=" ">
                                <label for="drive">Drive</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="youtube" id="youtube" placeholder=" ">
                                <label for="youtube">Youtube</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="facebook" id="facebook"
                                    placeholder=" ">
                                <label for="facebook">Facebook</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="linkedin" id="linkedin"
                                    placeholder=" ">
                                <label for="linkedin">LinkedIn</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="gmail" id="gmail" placeholder=" ">
                                <label for="gmail">Gmail</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="instagram" id="instagram"
                                    placeholder=" ">
                                <label for="instagram">Instagram</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="linktree" id="faclinktreeebook"
                                    placeholder=" ">
                                <label for="linktree">Linktree</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <textarea class="form-control" v-model="info_adicionais" placeholder=" "
                                    id="info_adicionais" style="height: 100px"></textarea>
                                <label for="info_adicionais">Informações adicionais</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="d-flex justify-content-between pt-4"> Informações de Domínio <h6 class="text-success">
                        Vencimento do Domínio: {{ vencimento_dominio }}</h6>
                </h4>
                <hr>
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="registro_dominio" id="registro_dominio"
                                    placeholder=" ">
                                <label for="registro_dominio">Local de Registro de Domínio</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="usuario_dominio" id="usuario_dominio"
                                    placeholder=" ">
                                <label for="usuario_dominio">Usuário</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="senha_dominio" id="senha_dominio"
                                    placeholder=" ">
                                <label for="senha_dominio">Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="d-flex justify-content-between pt-4"> Informações de Hospedagem <h6 class="text-success">
                        Vencimento da Hospedagem: {{ vencimento_hospedagem }}</h6>
                </h4>
                <hr>
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="hospedagem" id="hospedagem"
                                    placeholder=" ">
                                <label for="hospedagem">Local de Registro de Hospedagem</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="usuario_hospedagem"
                                    id="usuario_hospedagem" placeholder=" ">
                                <label for="usuario_hospedagem">Usuário</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="senha_hospedagem" id="senha_hospedagem"
                                    placeholder=" ">
                                <label for="senha_hospedagem">Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-6">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="dns_primario" id="dns_primario"
                                    placeholder=" ">
                                <label for="dns_primario">DNS Primario</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="dns_secundario" id="dns_secundario"
                                    placeholder=" ">
                                <label for="dns_secundario">DNS Secundaário</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="ftp" id="ftp" placeholder=" ">
                                <label for="ftp">FTP Url</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="usuario_ftp" id="usuario_ftp"
                                    placeholder=" ">
                                <label for="usuario_ftp">Usuário</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="senha_ftp" id="senha_ftp"
                                    placeholder=" ">
                                <label for="senha_ftp">Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="pt-4"> Site ADM </h4>
                <hr>
                <div class="row d-flex">
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="link_site_adm" id="link_site_adm"
                                    placeholder=" ">
                                <label for="link_site_adm">Link Painel ADM</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="usuario_site_adm" id="usuario_site_adm"
                                    placeholder=" ">
                                <label for="usuario_site_adm">Usuário</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating pb-3">
                            <div class="form-floating">
                                <input type="text" class="form-control" v-model="senha_site_adm" id="senha_site_adm"
                                    placeholder=" ">
                                <label for="senha_site_adm">Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <success-component :acao="retorno" :errors="errors"></success-component>
                <p></p>
                <button type="submit" class="btn btn-success" @click="updateSiteById">Salvar</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            sites: [],
            nome: '',
            sobrenome: '',
            email: '',
            cpf_cnpj: '',
            telefone: '',
            briefing: '',
            data_entrega: '',
            dominio: '',
            acesso_email: '',
            email_profissional: '',
            drive: '',
            youtube: '',
            facebook: '',
            linkedin: '',
            gmail: '',
            instagram: '',
            linktree: '',
            info_adicionais: '',
            registro_dominio: '',
            vencimento_dominio: '',
            usuario_dominio: '',
            senha_dominio: '',
            hospedagem: '',
            vencimento_hospedagem: '',
            usuario_hospedagem: '',
            senha_hospedagem: '',
            dns_primario: '',
            dns_secundario: '',
            ftp: '',
            usuario_ftp: '',
            senha_ftp: '',
            link_site_adm: '',
            usuario_site_adm: '',
            senha_site_adm: '',
            retorno: '',
        };
    },
    watch: {
        id(newId) {
            if (newId) {
                this.getSitesClientesById();
            }
        }
    },
    mounted() {
        if (this.id) {
            this.getSitesClientesById();
        }
    },
    props: [
        'token_csrf',
        'id'
    ],
    methods: {
        getSitesClientesById() {
            let url = '/api/listar/site-id?id=' + this.id

            axios.get(url)
                .then(response => {
                    this.sites = response.data;
                    this.atribuiVar()
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        updateSiteById() {
            let url = '/api/editar/site';

            let payload = {
                site_id: this.id,
                nome: this.nome,
                sobrenome: this.sobrenome,
                email: this.email,
                cpf_cnpj: this.cpf_cnpj,
                telefone: this.telefone,
                briefing: this.briefing,
                data_entrega: this.data_entrega,
                dominio: this.dominio,
                acesso_email: this.acesso_email,
                email_profissional: this.email_profissional,
                drive: this.drive,
                youtube: this.youtube,
                facebook: this.facebook,
                linkedin: this.linkedin,
                gmail: this.gmail,
                instagram: this.instagram,
                linktree: this.linktree,
                info_adicionais: this.info_adicionais,
                registro_dominio: this.registro_dominio,
                vencimento_dominio: this.vencimento_dominio,
                usuario_dominio: this.usuario_dominio,
                senha_dominio: this.senha_dominio,
                hospedagem: this.hospedagem,
                vencimento_hospedagem: this.vencimento_hospedagem,
                usuario_hospedagem: this.usuario_hospedagem,
                senha_hospedagem: this.senha_hospedagem,
                dns_primario: this.dns_primario,
                dns_secundario: this.dns_secundario,
                ftp: this.ftp,
                usuario_ftp: this.usuario_ftp,
                senha_ftp: this.senha_ftp,
                link_site_adm: this.link_site_adm,
                usuario_site_adm: this.usuario_site_adm,
                senha_site_adm: this.senha_site_adm
            };

            axios.post(url, payload, {
                headers: {
                    'X-CSRF-TOKEN': this.token_csrf
                }
            })
                .then(response => {
                    console.log('Site atualizado com sucesso!', response);
                    this.retorno = 'success';
                })
                .catch(error => {
                    console.log('Erro ao atualizar o site:', error);
                    this.retorno = 'error';
                });
        },
        atribuiVar() {
            this.nome = this.sites.info.clientes.nome;
            this.sobrenome = this.sites.info.clientes.sobrenome;
            this.email = this.sites.info.clientes.email;
            this.cpf_cnpj = this.sites.info.clientes.cpf_cnpj;
            this.telefone = this.sites.info.clientes.telefone;
            this.briefing = this.sites.info.resumos.briefing;
            this.data_entrega = this.sites.info.resumos.data_entrega;
            this.dominio = this.sites.info.dominio;
            this.acesso_email = this.sites.info.acesso_email;
            this.email_profissional = this.sites.info.email_profissional;
            this.drive = this.sites.info.drive;
            this.youtube = this.sites.info.youtube;
            this.facebook = this.sites.info.facebook;
            this.linkedin = this.sites.info.linkedin;
            this.gmail = this.sites.info.gmail;
            this.instagram = this.sites.info.instagram;
            this.linktree = this.sites.info.linktree;
            this.info_adicionais = this.sites.info.info_adicionais;
            this.registro_dominio = this.sites.info.registro_dominio;
            this.vencimento_dominio = this.sites.info.vencimento_dominio;
            this.usuario_dominio = this.sites.info.usuario_dominio;
            this.senha_dominio = this.sites.info.senha_dominio;
            this.hospedagem = this.sites.info.hospedagem;
            this.vencimento_hospedagem = this.sites.info.vencimento_hospedagem;
            this.usuario_hospedagem = this.sites.info.usuario_hospedagem;
            this.senha_hospedagem = this.sites.info.senha_hospedagem;
            this.dns_primario = this.sites.info.dns_primario;
            this.dns_secundario = this.sites.info.dns_secundario;
            this.ftp = this.sites.info.ftp;
            this.usuario_ftp = this.sites.info.usuario_ftp;
            this.senha_ftp = this.sites.info.senha_ftp;
            this.link_site_adm = this.sites.info.link_site_adm;
            this.usuario_site_adm = this.sites.info.usuario_site_adm;
            this.senha_site_adm = this.sites.info.senha_site_adm;
        }
    }
}
</script>

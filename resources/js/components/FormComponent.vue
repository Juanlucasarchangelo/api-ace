<template>
    <success-component :acao="retorno" :errors="errors"></success-component>
    <form @submit="create">
        <input type="hidden" :value="token_csrf" name="token_csrf">
        <div v-if="tabela == 'site'">
            <div class="row d-flex">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="dominio" v-model="dominio"
                            placeholder="seudominio.com">
                        <label for="dominio">Dominio</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="hospedagem" v-model="hospedagem"
                            placeholder="Hostgator">
                        <label for="hospedagem">Hoepdagem</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-floating pb-3">
                        <select class="form-select" id="responsaveis" v-model="responsaveis"
                            aria-label="Floating label select example">
                            <option selected>Responsáveis</option>
                            <option v-if="clientes && clientes.mensagem" v-for="cliente in clientes.mensagem"
                                :key="cliente.id" :value="cliente.id">
                                {{ cliente.nome }}
                            </option>
                        </select>

                        <label for="responsaveis">Selecione o dono do site</label>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="tabela == 'cliente'">
            <div class="row d-flex">
                <div class="col-4">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nome" v-model="nome" placeholder=" ">
                        <label for="nome">Nome</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="sobrenome" v-model="sobrenome" placeholder=" ">
                        <label for="sobrenome">Sobrenome</label>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email" v-model="email" placeholder=" ">
                        <label for="email">E-mail</label>
                    </div>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cpf_cnpj" v-model="cpf_cnpj" placeholder=" ">
                        <label for="cpf_cnpj">CPF/CNPJ</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="telefone" v-model="telefone" placeholder=" ">
                        <label for="telefone">Telefone</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-floating pb-3">
                        <select class="form-select" id="endereco_form" v-model="endereco_form"
                            aria-label="Floating label select example">
                            <option selected>Responsáveis</option>
                            <option v-if="enderecos && enderecos.mensagem" v-for="endereco in enderecos.mensagem"
                                :key="endereco.id" :value="endereco.id">
                                {{ endereco.endereco + ', ' + endereco.bairro + ', ' + endereco.cidade + ', ' +
                                    endereco.numero + ' - ' + endereco.cep }}
                            </option>
                        </select>
                        <label for="endereco_form">Selecione o endereço.</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <button type="reset" class="btn btn-outline-primary">Limpar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            // Site
            clientes: [],
            dominio: '',
            hospedagem: '',
            responsaveis: '',
            retorno: '',

            // Cliente
            enderecos: [],
            endereco_form: '',
            nome: '',
            sobrenome: '',
            email: '',
            cpf_cnpj: '',
            telefone: '',

            errors: []
        }
    },
    mounted() {
        this.getClientes();
        this.getEnderecos();
    },
    props: [
        'token_csrf',
        'tabela'
    ],
    methods: {
        getClientes() {
            let url = '/api/listar/cliente'
            axios.get(url)
                .then(response => {
                    this.clientes = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getEnderecos() {
            let url = '/api/listar/endereco'
            axios.get(url)
                .then(response => {
                    this.enderecos = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        create(event) {
            event.preventDefault();

            let url = '';
            let data = {};

            if (this.tabela == 'site') {
                url = '/api/cadastrar/site';
                data = {
                    clientes_id: this.responsaveis,
                    dominio: this.dominio,
                    hospedagem: this.hospedagem,
                    _token: this.token_csrf
                };
            } else if (this.tabela == 'cliente') {
                url = '/api/cadastrar/cliente';
                data = {
                    nome: this.nome,
                    sobrenome: this.sobrenome,
                    email: this.email,
                    cpf_cnpj: this.cpf_cnpj,
                    telefone: this.telefone,
                    enderecos_id: this.endereco_form,
                    _token: this.token_csrf
                };
            }

            axios.post(url, data)
                .then(response => {
                    this.retorno = 'success';
                    this.clearForm();
                })
                .catch(errors => {
                    this.errors = errors.response.data.erros;
                    console.log(this.errors);
                    this.retorno = 'error';
                });
        },
        clearForm() {
            this.dominio = '';
            this.hospedagem = '';
            this.responsaveis = '';
            this.endereco_form = '',
            this.nome = '',
            this.sobrenome = '',
            this.email = '',
            this.cpf_cnpj = '',
            this.telefone = ''
        }
    }
}
</script>

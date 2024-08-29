<template>
    <success-component :acao="retorno" :errors="errors"></success-component>
    <form @submit="createSite">
        <input type="hidden" :value="token_csrf" name="token_csrf">
        <div class="row d-flex">
            <div class="col-6">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="dominio" v-model="dominio" placeholder="seudominio.com">
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
            clientes: [],
            dominio: '',
            hospedagem: '',
            responsaveis: '',
            retorno: '',
            errors: []
        }
    },
    mounted() {
        this.getClientes();
    },
    props: [
        'token_csrf'
    ],
    methods: {
        getClientes() {
            let url = '/api/listar-cliente'
            axios.get(url)
                .then(response => {
                    this.clientes = response.data;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        createSite(event) {
            event.preventDefault();
            
            let url = '/api/cadastrar-site';
            let data = {
                clientes_id: this.responsaveis,
                dominio: this.dominio,
                hospedagem: this.hospedagem,
                _token: this.token_csrf
            };

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
        }
    }
}
</script>

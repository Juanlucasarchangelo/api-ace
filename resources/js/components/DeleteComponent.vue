<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Desativar Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" :value="token_csrf" name="token_csrf">
                <div>
                    <p>Deseja realmente desativar o domínio <strong class="text-primary">{{ dominio }} ?</strong></p>
                    <p>Domínio pertencente ao usuário <strong class="text-primary">{{ nome }} {{ sobrenome }}</strong>
                    </p>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <success-component :acao="retorno" :errors="errors"></success-component>
                <p></p>
                <button type="submit" class="btn btn-danger" @click="deleteSiteById">Desativar</button>
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
            dominio: '',
            retorno: '',
            errors: []
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
        deleteSiteById() {
            let url = '/api/excluir/site';

            let payload = {
                site_id: this.id
            }

            axios.post(url, payload, {
                headers: {
                    'X-CSRF-TOKEN': this.token_csrf
                }
            })
                .then(response => {
                    response
                    this.retorno = 'success';
                })
                .catch(error => {
                    this.retorno = 'error';
                });
        },
        atribuiVar() {
            this.nome = this.sites.info.clientes.nome;
            this.sobrenome = this.sites.info.clientes.sobrenome;
            this.dominio = this.sites.info.dominio;
        }
    }
}
</script>

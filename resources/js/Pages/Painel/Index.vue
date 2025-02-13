<template>
    <div class="container">
        <div class="row d-flex justify-content-between pb-4">
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Briefings <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-postcard pe-2"></i>{{ this.briefingCount }}</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Sites <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-columns pe-2"></i>{{ this.siteCount }}</span>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        Clientes <span class="bg-success bg-opacity-25 rounded-pill p-2"><i
                                class="bi bi-person pe-2"></i>{{ this.clienteCount }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between pb-5">
            <div class="col">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center pt-3">
                        <h4>Informações</h4>
                        <div class="dropdown">
                            <span class="btn rounded-pill p-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                    class="bi bi-three-dots-vertical"></i></span>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Excluir Sessão</a></li>
                                <li><a class="dropdown-item" href="#">Desabilitar</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover pb-5">
                            <thead>
                                <th scope="col">Cliente</th>
                                <th scope="col">Venc. Host</th>
                                <th scope="col">Venc. Domínio</th>
                                <th scope="col">Site</th>
                                <th scope="col">Ação</th>
                            </thead>
                            <tbody>
                                <tr v-if="sites && sites.mensagem" v-for="sites in sites.mensagem">
                                    <td class="row d-flex justify-content-between">
                                        <span>{{ `${sites.responsavel}   ${sites.sobrenome}` }}</span>
                                        <span>{{ sites.email }}</span>
                                    </td>
                                    <td>{{ sites.vencimento_hospedagem }}</td>
                                    <td>{{ sites.vencimento_dominio }}</td>
                                    <td><a :href="'https://' + sites.dominio" target="_blank">{{
                                        sites.dominio }}</a></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info me-3" @click="getId(sites.id)"
                                            data-bs-toggle="modal" data-bs-target="#editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" @click="getId(sites.id)"
                                            data-bs-toggle="modal" data-bs-target="#excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr v-else>
                                    <td class="row d-flex justify-content-between">
                                        <span>-</span>
                                        <span>-</span>
                                    </td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><a href="https://" target="_blank">-</a></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info me-3" data-bs-toggle="modal"
                                            data-bs-target="#editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="excluir"
                                            data-bs-target="#excluir">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Informações -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
        <modal-info-component :token_csrf="token_csrf" :id="id" acao="site"></modal-info-component>
    </div>

    <!-- Modal Informações -->
    <div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="excluir" aria-hidden="true">
        <delete-component :token_csrf="token_csrf" :id="id" acao="site"></delete-component>
    </div>

</template>

<script>
export default {
    data() {
        return {
            sites: [],
            siteCount: [],
            clienteCount: [],
            briefingCount: [],
            id: '',
            errors: []
        }
    },
    mounted() {
        this.getSitesClientes(),
            this.getClientes(),
            this.getBrieings()
    },
    props: [
        'colunas',
        'token_csrf'
    ],
    methods: {
        getSitesClientes() {
            let url = '/api/listar/site'

            axios.get(url)
                .then(response => {
                    this.sites = response.data;
                    this.siteCount = Array.isArray(response.data.mensagem) ? response.data.mensagem.length : 0;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getClientes() {
            let url = '/api/listar/cliente'

            axios.get(url)
                .then(response => {
                    this.clienteCount = Array.isArray(response.data.mensagem) ? response.data.mensagem.length : 0;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getBrieings() {
            let url = '/api/listar/briefing'

            axios.get(url)
                .then(response => {
                    this.briefingCount = Array.isArray(response.data.mensagem) ? response.data.mensagem.length : 0;
                })
                .catch(errors => {
                    console.log(errors);
                });
        },
        getId(id) {
            this.id = id
        }
    }
}
</script>
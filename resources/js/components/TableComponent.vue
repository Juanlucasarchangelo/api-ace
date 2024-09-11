<template>
    <table class="table table-hover pb-5">
        <thead>
            <tr>
                <th scope="col">Cliente</th>
                <th scope="col">Venc. Host</th>
                <th scope="col">Venc. Domínio</th>
                <th scope="col">site</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="sites && sites.mensagem" v-for="site in sites.mensagem">
                <td class="row d-flex justify-content-between">
                    <span>{{ `${site.responsavel} ${site.sobrenome}` }}</span>
                    <span>{{ site.email }}</span>
                </td>
                <td>{{ site.vencimento_hospedagem }}</td>
                <td>{{ site.vencimento_dominio }}</td>
                <td><a :href="'https://' + site.dominio" target="_blank">{{ site.dominio }}</a></td>
                <td>
                    <button type="button" class="btn btn-outline-info me-3" @click="getId(site.id)" data-bs-toggle="modal" data-bs-target="#editar">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger" @click="getId(site.id)" data-bs-toggle="modal" data-bs-target="#excluir">
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

    <!-- Modal Informações -->
    <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editar" aria-hidden="true">
        <modal-info-component :token_csrf="token_csrf" :id="id"></modal-info-component>
    </div>

    <!-- Modal Informações -->
    <div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="excluir" aria-hidden="true">
        <delete-component :token_csrf="token_csrf" :id="id"></delete-component>
    </div>

</template>

<script>
export default {
    data() {
        return {
            sites: [],
            id: '',
            errors: []
        }
    },
    mounted() {
        this.getSitesClientes()
    },
    props: [
        'token_csrf'
    ],
    methods: {
        getSitesClientes() {
            let url = '/api/listar/site'

            axios.get(url)
                .then(response => {
                    this.sites = response.data;
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

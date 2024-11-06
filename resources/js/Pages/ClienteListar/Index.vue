<template>
    <div class="container">
        <h2 class="pb-3">
            Listar Clientes
        </h2>
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
                                <th scope="col">Nome</th>
                                <th scope="col">CPF/CNPJ</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ação</th>
                            </thead>
                            <tbody>
                                <tr v-if="clientes && clientes.mensagem" v-for="clientes in clientes.mensagem">
                                    <td class="row d-flex justify-content-between">
                                        <span>{{ `${clientes.nome} ${clientes.sobrenome}` }}</span>
                                        <span>{{ clientes.email }}</span>
                                    </td>
                                    <td>{{ clientes.cpf_cnpj }}</td>
                                    <td>{{ clientes.telefone }}</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-info me-3" @click="getId(clientes.id)"
                                            data-bs-toggle="modal" data-bs-target="#editar">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline-danger" @click="getId(clientes.id)"
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
        <modal-info-component :token_csrf="token_csrf" :id="id" acao="cliente"></modal-info-component>
    </div>

    <!-- Modal Informações -->
    <div class="modal fade" id="excluir" tabindex="-1" aria-labelledby="excluir" aria-hidden="true">
        <delete-component :token_csrf="token_csrf" :id="id" acao="cliente"></delete-component>
    </div>

</template>

<script>
export default {
    data() {
        return {
            clientes: [],
            id: '',
            errors: []
        }
    },
    mounted() {
        this.getClientes()
    },
    props: [
        'token_csrf'
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
        getId(id) {
            this.id = id
        }
    }
}
</script>
<template>
    <table class="table table-hover pb-5">
        <thead>
            <th v-for="(coluna, index) in colunas" :key="index" scope="col">
                {{ coluna }}
            </th>
        </thead>
        <tbody>
            <tr v-if="informacoes && informacoes.mensagem" v-for="informacoes in informacoes.mensagem">
                <td class="row d-flex justify-content-between">
                    <span>{{ `${informacoes.responsavel} ${informacoes.sobrenome}` }}</span>
                    <span>{{ informacoes.email }}</span>
                </td>
                <td>{{ informacoes.vencimento_hospedagem }}</td>
                <td>{{ informacoes.vencimento_dominio }}</td>
                <td><a :href="'https://' + informacoes.dominio" target="_blank">{{ informacoes.dominio }}</a></td>
                <td>
                    <button type="button" class="btn btn-outline-info me-3" @click="getId(informacoes.id)"
                        data-bs-toggle="modal" data-bs-target="#editar">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button type="button" class="btn btn-outline-danger" @click="getId(informacoes.id)" data-bs-toggle="modal"
                        data-bs-target="#excluir">
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
            id: '',
            errors: []
        }
    },
    props: [
        'colunas',
        'token_csrf',
        'informacoes',
        'linhas'
    ]
}
</script>

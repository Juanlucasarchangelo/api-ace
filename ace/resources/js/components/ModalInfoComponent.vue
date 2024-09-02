<template>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Consulte e atualize informações</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form @submit="create">
                    <input type="hidden" :value="token_csrf" name="token_csrf">
                    <div class="row d-flex">
                        <div class="col-4">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nome" v-model="nome" placeholder=" ">
                                <label for="nome">Nome</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="sobrenome" v-model="sobrenome"
                                    placeholder=" ">
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
                                <input type="text" class="form-control" id="cpf_cnpj" v-model="cpf_cnpj"
                                    placeholder=" ">
                                <label for="cpf_cnpj">CPF/CNPJ</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="telefone" v-model="telefone"
                                    placeholder=" ">
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
                                    <option v-if="enderecos && enderecos.mensagem"
                                        v-for="endereco in enderecos.mensagem" :key="endereco.id" :value="endereco.id">
                                        {{ endereco.endereco + ', ' + endereco.bairro + ', ' + endereco.cidade + ', ' +
                                            endereco.numero + ' - ' + endereco.cep }}
                                    </option>
                                </select>
                                <label for="endereco_form">Selecione o endereço.</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="reset" class="btn btn-outline-primary">Limpar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            // Outras propriedades
        };
    },
    props: [
        'token_csrf',
        'sites'
    ],
    methods: {
        // Métodos do componente
    }
}
</script>

<template>
    <div v-if="acao === 'error'" class="alert alert-danger" role="alert">
        <div v-if="errors.length">
            <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        <div v-else>
            Erro desconhecido.
        </div>
    </div>
    <div v-if="acao === 'success'" class="alert alert-success" role="alert">
        <strong>Sucesso!</strong> O registro foi criado com sucesso.
    </div>
</template>

<script>
export default {
    props: [
        'acao',
        'errors'
    ]
}
</script>
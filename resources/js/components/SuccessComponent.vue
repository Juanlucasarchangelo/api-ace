<template>
    <div v-if="showAlert && acao" class="alert" :class="alertClass" role="alert">
        <div v-if="acao === 'error' && errors.length">
            <ul>
                <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
            </ul>
        </div>
        <div v-else-if="acao === 'error'">
            Erro desconhecido.
        </div>
        <div v-if="acao === 'success'">
            <strong>Sucesso!</strong> Ação realizada com sucesso.
        </div>
    </div>
</template>

<script>
export default {
    props: {
        acao: String,
        errors: {
            type: Array,
            default: () => []
        },
        timeout: {
            type: Number,
            default: 4000 
        }
    },
    data() {
        return {
            showAlert: false
        };
    },
    computed: {
        alertClass() {
            return this.acao === 'error' ? 'alert-danger' : 'alert-success';
        }
    },
    watch: {
        acao(newAcao) {
            if (newAcao) {
                this.showAlert = true;
                this.startTimeout();
            }
        }
    },
    methods: {
        startTimeout() {
            setTimeout(() => {
                this.showAlert = false;
            }, this.timeout);
        }
    },
    mounted() {
        if (this.acao) {
            this.showAlert = true;
            this.startTimeout();
        }
    }
}
</script>

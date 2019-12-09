<template>
    <div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Visar entrada</h1>
            </div>
        </div>
        <div class="visado-container">
            <VisarEntradaComponent v-if="visado==null" @entradaEvent="getVisado()" />
            <VisarSalidaComponent :visado="visado" v-else @salidaEvent="getVisado()" />
        </div>
    </div>
</template>

<script>
    import VisarEntradaComponent from "../components/VisarEntradaComponent"
    import VisarSalidaComponent from "../components/VisarSalidaComponent"
    export default {
        components: {
            VisarEntradaComponent,
            VisarSalidaComponent
        },

        mounted () {
            this.getVisado();
        },

        data() {
            return {
                visado:null
            }
        },

        methods: {
            getVisado() {
                axios.get("visado")
                    .then(res => {
                        console.log(res.data)
                        this.visado = res.data[0]
                    })
            }
        },
    }
</script>

<style lang="scss" scoped>
.visado-container{
    width: 100vw;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<template>
    <div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4" v-if="visado==null" >Visar entrada</h1>
                <h1 class="display-4" v-else>Visar salida</h1>
            </div>
        </div>
        <div class="visado-container">
            <VisarEntradaComponent v-if="visado==null" @entradaEvent="getVisado(msj)" />
            <VisarSalidaComponent :visado="visado" v-else @salidaEvent="getVisado(msj)" />
        </div>
        <transition name="fade">
            <div class="alert alert-success notificacion" v-if="mensaje" role="alert">
                <span>{{mensaje}}</span>
                <div @click="cerrar()">X</div>
            </div>
        </transition>
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
                visado:null,
                mensaje:""
            }
        },

        methods: {
            getVisado(msj) {
                axios.get("api/visado")
                    .then(res => {
                        console.log(res.data)
                        this.visado = res.data[0]
                    })
                if(msj){
                    this.mensaje = msj;
                }
            },
            cerrar(){
                this.mensaje = ""
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
.notificacion{
    width: 100vw;
    position: fixed;
    bottom: 0;
    margin: 0;
    display: flex;
    justify-content: space-between;}

.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>
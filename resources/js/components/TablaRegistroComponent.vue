<template>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora entrada</th>
                <th scope="col">Motivo entrada</th>
                <th scope="col">Hora salida</th>
                <th scope="col">Motivo Salida</th>
                </tr>
            </thead>
            <tbody v-for="dato in datos" :key="dato.id">
                <tr>
                <th scope="row">{{dato.id}}</th>
                <td>{{convertirFecha(dato.created_at)}}</td>
                <td>{{convertirFechaEnHoras(dato.visado_entrada.fecha_entrada)}}</td>
                <td>{{dato.visado_entrada.motivo_entrada}}</td>
                <td v-if="dato.visado_salida == null" colspan="2">Salida no registrada</td>
                <td v-if="dato.visado_salida != null">{{convertirFechaEnHoras(dato.visado_salida.fecha_salida)}}</td>
                <td v-if="dato.visado_salida != null">{{dato.visado_salida.motivo_salida || "Sin motivos"}}</td>
                </tr>
            </tbody>
        </table>
</template>

<script>
    export default {
        mounted () {
            this.cargarDatos();
        },
        data() {
            return {
                datos: ""
            }
        },
        methods: {
            cargarDatos() {
                axios.get("api/registro")
                    .then(res => this.datos = res.data)
            },
            convertirFechaEnHoras(date){
                let fecha = new Date(date)
                return `${fecha.getHours()}:${fecha.getMinutes()}`
            },
            convertirFecha(date){
                let fecha = new Date(date)
                return `${fecha.getDay()}/${fecha.getMonth()}/${fecha.getFullYear()}`
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
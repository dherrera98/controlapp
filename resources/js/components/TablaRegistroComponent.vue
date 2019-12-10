<template>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Salida visada</th>
                <th scope="col">Entrada visada</th>
                <th scope="col">Terminado</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
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
            }
        },
    }
</script>

<style lang="scss" scoped>

</style>
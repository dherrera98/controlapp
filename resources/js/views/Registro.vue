<template>
    <div>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Registro</h1>
            </div>
        </div>
        <TablaRegistroComponent/>
    </div>
</template>

<script>
    import TablaRegistroComponent from "../components/TablaRegistroComponent"
    export default {
        components: {
            TablaRegistroComponent,
        },
    }
</script>

<style lang="scss" scoped>

</style>
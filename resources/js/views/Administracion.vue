<template>
<div>
  <div class="jumbotron">
    <div class="container">
        <h1 class="display-4">Panel de Administracion</h1>
    </div>
  </div>
  <ModalInfoUser :usuarioId="usuarioId" v-if="abrirModal" @cerrarModal="abrirModal=false"></ModalInfoUser>
  <div class="list-group" v-for="usuario in usuarios" :key="usuario.id">
      <button type="button" class="list-group-item list-group-item-action" @click="usuarioId = usuario.id; abrirModal=true">{{usuario.name}}</button>
  </div>
</div>
</template>

<script>
  import ModalInfoUser from "../components/ModalInfoUser";
  export default {
    components: {
      ModalInfoUser,
    },
    beforeCreate () {
      axios.get("/api/administracion")
        .then(res => this.usuarios = res.data);

      axios.get("/api/administracion/ajustes")
        .then(res => this.ajustes = res.data)
    },
    data() {
      return {
        usuarios: [],
        usuarioId: 0,
        abrirModal: false,
        ajustes: null
      }
    },
  }
</script>

<style lang="scss" scoped>

</style>
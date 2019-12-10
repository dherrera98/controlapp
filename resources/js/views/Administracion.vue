<template>
<div>
  <div class="list-group">
    <ul v-for="usuario in usuarios" :key="usuario.id">
      <li>{{usuario.id}}</li>
    </ul>
  </div>
</div>
</template>

<script>
  export default {
    beforeCreate () {
      axios.get("/api/administracion")
        .then(res => this.usuarios = res.data);
    },
    data() {
      return {
        usuarios: [
          {"id":1,"name":"David Manuel Herrera Rodríguez","email":"nuclearodin9@gmail.com","esAdmin":0,"email_verified_at":null,"created_at":"2019-12-10 11:54:40","updated_at":"2019-12-10 11:54:40"},
          {"id":2,"name":"prueba","email":"asdf1234@gmail.com","esAdmin":0,"email_verified_at":null,"created_at":"2019-12-10 13:20:51","updated_at":"2019-12-10 13:20:51"}
          ]
      }
    },
  }
</script>

<style lang="scss" scoped>

</style>
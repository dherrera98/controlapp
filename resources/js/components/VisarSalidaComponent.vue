<template>
  <div class="card card-container">
    <div class="card-body">
      <div
        class="card-title"
      >Visar salida</div>
      <div>
        <p>
          <span><strong>Entrada visada a las:</strong> {{convertirTiempo(visado.visado_entrada.fecha_entrada)}}</span> <br>
          <span v-if="visado.visado_entrada.motivo_entrada"><strong>Con motivo de entrada:</strong> {{visado.visado_entrada.motivo_entrada}}</span>
        </p>
      </div>
      <form @submit.prevent="terminarVisado()">
        <div class="form-group">
          <label
            for="motivo"
          >Motivo de salida</label>
          <input
            type="text"
            class="form-control"
            id="motivo"
            v-model="motivo"
          >
          <small
            id="emailHelp"
            class="form-text text-muted card-note"
          ><strong>Nota:</strong> el motivo es obligatorio si no se sale a tu hora.</small>
        </div>
        <button
          type="submit"
          class="btn btn-primary btn-block"
        >Visar salida</button>

      </form>
    </div>
  </div>
</template>

<script>
export default {
  props:["visado"],
  data () {
    return {
      motivo: "",
      mensajes:{
        correcto:"",
        error:""
      }
    }
  },
  watch: {
    motivo (newValue, oldValue) {
      if (newValue && newValue.toLowerCase() != oldValue.toLowerCase()) {
        this.motivo = newValue.charAt(0).toUpperCase() + this.motivo.slice(1)
      }
    }
  },
  methods: {
    terminarVisado() {
      const params = {
        motivo_salida : this.motivo
      }

      axios.put(`api/visado/1`, params)
      .then(res => {
          this.$emit('salidaEvent')
        })
        .catch(err => {
            this.$emit('salidaEvent')
          })
    },
    convertirTiempo(date){
      const tiempo = new Date(date);

      return `${tiempo.getHours()}:${tiempo.getMinutes()}`;
    }
  },
}
</script>

<style lang="scss" scoped>
.card-container {
  width: 90vw;
  max-width: 600px;
}
.card-note {
  font-weight: bold;
}
</style>
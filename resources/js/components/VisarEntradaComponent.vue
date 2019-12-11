<template>
  <div :class="['card', 'card-container', darkMode ? 'bg-dark':'']">
    <div class="card-body">
      <div
        class="card-title"
        :class="darkMode ? 'text-light':''"
      >Visar entrada</div>
      <form @submit.prevent="empezarEntrada()">
        <div class="form-group">
          <label
            for="motivo"
            :class="darkMode ? 'text-light':''"
          >Motivo de entrada</label>
          <input
            type="text"
            class="form-control"
            id="motivo"
            v-model="motivo"
          >
          <small
            id="emailHelp"
            class="form-text text-muted"
            :class="[darkMode ? 'text-light':'', 'card-note']"
          ><span>Nota:</span> el motivo es opcional.</small>
        </div>
        <button
          type="submit"
          class="btn btn-primary btn-block"
        >Visar entrada</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data () {
    return {
      motivo: "",
      darkMode: false,
      mensajes: {
        correcto: "",
        error: ""
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
    empezarEntrada () {
      const params = {
        motivo_entrada: this.motivo
      }

      axios.post('api/visado', params)
        .then(res => {
          this.$emit('entradaEvent')
          this.$toasted.show('Entrada visada!');
        })
        .catch(err => {
          this.$emit('entradaEvent')
          this.$toasted.show('Error al visar la entrada!');
  })
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
<template>
  <div :class="['card', 'card-container', darkMode ? 'bg-dark':'']">
    <div class="card-body">
      <div
        class="card-title"
        :class="darkMode ? 'text-light':''"
      >Visar salida</div>
      <form @submit.prevent="terminarVisado()">
        <div class="form-group">
          <label
            for="motivo"
            :class="darkMode ? 'text-light':''"
          >Motivo</label>
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
        >Visar salida</button>

      </form>
    </div>
  </div>
</template>

<script>
import EventBus from "../event-bus"
export default {
  props:["visado"],
  data () {
    return {
      motivo: "",
      darkMode: false
    }
  },
  created () {
    EventBus.$on("changeTheme", (theme) => this.darkMode = theme)
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

      axios.put(`/visado/1`, params)
        .then(res => this.$emit('salidaEvent'))
        .catch(err => console.log(err))
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
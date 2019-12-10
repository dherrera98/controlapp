<template>
  <footer>
    <p class="text-dark">
      Laravel + Vuejs = ControlAPP 💚
    </p>
  </footer>
</template>

<script>
import EventBus from "../event-bus"
export default {
  data () {
    return {
      darkMode: false
    }
  },
  created () {
    EventBus.$on("changeTheme", (theme) => this.darkMode = theme)
  },
}
</script>

<style lang="scss" scoped>
footer {
  width: 100vw;
  padding: 25px 0;
  display: flex;
  justify-content: center;
  & > p {
    margin: 0;
  }
}
</style>
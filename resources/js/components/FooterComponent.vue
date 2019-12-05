<template>
  <footer :class="darkMode ? 'bg-dark':'bg-light'">
    <p :class="darkMode ? 'text-light':'text-dark'">
      Laravel + Vuejs = ControlApp 💚
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
<template>
  <div>
    <img
      src="../../../public/icons/sun.svg"
      alt="sun"
      class="icon"
      @click="changeTheme()"
      v-if="!darkMode"
    >
    <img
      src="../../../public/icons/moon.svg"
      alt="moon"
      class="icon"
      @click="changeTheme()"
      v-else
    >
  </div>
</template>

<script>
import EventBus from "../event-bus"
export default {
  mounted () {
    const darkModeLocalStorage = localStorage.getItem("darkModel")
    if (darkModeLocalStorage != null) {
      this.darkMode = darkModeLocalStorage;
    }
  },
  data () {
    return {
      darkMode: false
    }
  },
  methods: {
    changeTheme () {
      this.darkMode = !this.darkMode;
      localStorage.setItem("darkMode", this.datkMode);
      EventBus.$emit('changeTheme', this.darkMode)
    }
  },
}
</script>

<style lang="scss" scoped>
.icon {
  width: 30px;
  height: 30px;
}
</style>
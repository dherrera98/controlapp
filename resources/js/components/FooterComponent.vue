<template>
  <footer>
    <p class="text-dark">
      Laravel + Vuejs = ControlAPP 💚
    </p>
  </footer>
</template>

<script>
export default {
  data () {
    return {
      darkMode: false
    }
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
<template>
  <div id="root">
    <Progress :transitionDuration="5000" :radius="55" :strokeWidth="10" value="86.12567">
      <div class="content">hello</div>
      <template v-slot:footer>
        <b>More Precise</b>
      </template>
    </Progress>
  </div>
</template>

<script>
  export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss">
#root {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  height: 100vh;
  color: #fff;
  background: #3e423a;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>
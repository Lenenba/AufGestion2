<template>
  <modal name="sites-modal" :names=[]> 
      
      {{ name }}

  </modal>
</template>

<script>
export default {
  props:{
      names:Array
  },
  data () {
    return {
      name: this.names
    }
  },
  methods: {
    openModal () {
      this.$modal.show({
        template: `<span>Hello, {{ name }}!</span>`,
        props: ['name']
      }, {
        name: this.name
      }, {
        width: 300,
        height: 300
      }, {
        'before-open': this.beforeOpen,
        'before-close': this.beforeClose
      })
    },
    beforeOpen (event) {
      console.log('Opening...')
    },
    beforeClose (event) {
      console.log('Closing...')
      // What a gamble... 50% chance to cancel closing
      if (Math.random() < 0.5) {
        event.cancel()
      }
    }
  }
}
</script>
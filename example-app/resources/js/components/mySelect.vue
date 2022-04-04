<template>
  
</template>

<script>
export default {
  props:{
    modalValue: {
      type: String,
    },
    options:{
      type:Array,
      default: () => []
    } 
  }, 
  methods:{
    changeOption (event) {
      this.$emit('update:modalValue', event.target.value)
    }
  }
}
</script>

<style>

</style>
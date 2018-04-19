<template>
<div>
<div class="modal is-active"  v-show="showModal">
  <div class="modal-background"></div>
  <div class="modal-content">
      <div class="box">
   {{body}}
   </div>
  </div>
  <button class="modal-close is-large" aria-label="close" @click="showModal=false"></button>
</div>
    <button @click="showModal=true">{{buttontext}}</button>

</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component Modal mounted.')
        },
        props: ['body','buttontext'],
        data() {
         return {
             showModal:false
         }
         
        }
    }
</script>